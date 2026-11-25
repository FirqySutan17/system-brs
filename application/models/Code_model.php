
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_model extends CI_Model
{
    protected $table = 'cd_code';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * General Code list.
     * CODE = '*' is the category/header record.
     */
    public function get_unique_head()
    {
        return $this->db
            ->select('head_code, code, code_name, use_yn')
            ->where('code', '*')
            ->order_by('head_code', 'ASC')
            ->get($this->table)
            ->result();
    }

    /**
     * Get category header by HEAD_CODE.
     */
    public function get_head($head_code)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code', '*')
            ->get($this->table)
            ->row();
    }

    /**
     * Get code members by HEAD_CODE.
     * Excludes CODE = '*'.
     */
    public function get_data_by_head(
        $head_code,
        $search = '',
        $limit = 100,
        $start = 0,
        $order = 'code',
        $dir = 'ASC'
    ) {
        $allowed_order = [
            'code',
            'code_name',
            'use_yn',
            'desc1'
        ];

        if (!in_array($order, $allowed_order, true)) {
            $order = 'code';
        }

        $dir = strtoupper($dir) === 'DESC' ? 'DESC' : 'ASC';

        $this->db->where('head_code', $head_code);
        $this->db->where('code !=', '*');

        if ($search !== '') {
            $this->db->group_start();
            $this->db->like('code', $search);
            $this->db->or_like('code_name', $search);
            $this->db->or_like('desc1', $search);
            $this->db->or_like('desc2', $search);
            $this->db->group_end();
        }

        $this->db->order_by($order, $dir);

        return $this->db
            ->get($this->table, (int) $limit, (int) $start)
            ->result();
    }

    public function count_data_by_head($head_code, $search = '')
    {
        $this->db->where('head_code', $head_code);
        $this->db->where('code !=', '*');

        if ($search !== '') {
            $this->db->group_start();
            $this->db->like('code', $search);
            $this->db->or_like('code_name', $search);
            $this->db->or_like('desc1', $search);
            $this->db->or_like('desc2', $search);
            $this->db->group_end();
        }

        return $this->db->count_all_results($this->table);
    }

    /**
     * Get one record using composite primary key.
     */
    public function get_by_pk($head_code, $code)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code', $code)
            ->get($this->table)
            ->row();
    }

    /**
     * Check whether composite key already exists.
     */
    public function exists($head_code, $code)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code', $code)
            ->count_all_results($this->table) > 0;
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update non-key fields only.
     */
    public function update($head_code, $code, $data)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code', $code)
            ->update($this->table, $data);
    }

    public function delete($head_code, $code)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code', $code)
            ->delete($this->table);
    }

    /**
     * Check if category still has member codes.
     */
    public function has_members($head_code)
    {
        return $this->db
            ->where('head_code', $head_code)
            ->where('code !=', '*')
            ->count_all_results($this->table) > 0;
    }

    /**
     * Search all records, excluding category header records.
     */
    public function get_all($search = '')
    {
        $this->db->where('code !=', '*');

        if ($search !== '') {
            $this->db->group_start();
            $this->db->like('head_code', $search);
            $this->db->or_like('code', $search);
            $this->db->or_like('code_name', $search);
            $this->db->or_like('desc1', $search);
            $this->db->group_end();
        }

        return $this->db
            ->order_by('head_code', 'ASC')
            ->order_by('code', 'ASC')
            ->get($this->table)
            ->result();
    }
}
