
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material_model extends CI_Model
{
    private $table = 'cd_material';

    /**
     * Material list with filters.
     */
    public function get_material_list($filters = [])
    {
        $this->db->from($this->table);

        // Only active material.
        $this->db->where(
            "(delete_flag IS NULL OR delete_flag <> 'Y')",
            NULL,
            FALSE
        );

        // Search Material Code or Name.
        if (!empty($filters['search'])) {
            $search = $this->db->escape(
                '%' . trim($filters['search']) . '%'
            );

            $this->db->where(
                "(
                    material ILIKE {$search}
                    OR COALESCE(material_name, '') ILIKE {$search}
                    OR COALESCE(material_sname, '') ILIKE {$search}
                )",
                NULL,
                FALSE
            );
        }

        // Material filter.
        if (!empty($filters['material'])) {
            $material = $this->db->escape(
                '%' . trim($filters['material']) . '%'
            );

            $this->db->where(
                "material ILIKE {$material}",
                NULL,
                FALSE
            );
        }

        // Material Class filter.
        if (!empty($filters['class1'])) {
            $this->db->where('class1', $filters['class1']);
        }

        // Using Class filter.
        if (!empty($filters['class2'])) {
            $this->db->where('class2', $filters['class2']);
        }

        $this->db->order_by('material', 'ASC');

        return $this->db->get()->result();
    }

    /**
     * Get material detail.
     */
    public function get_by_material($material)
    {
        return $this->db
            ->where('material', $material)
            ->where(
                "(delete_flag IS NULL OR delete_flag <> 'Y')",
                NULL,
                FALSE
            )
            ->get($this->table)
            ->row();
    }

    /**
     * Check duplicate material code.
     */
    public function exists_material($material)
    {
        return $this->db
            ->where('material', $material)
            ->count_all_results($this->table) > 0;
    }

    /**
     * Get dropdown options from cd_code.
     */
    public function get_dropdown_codes($head_code)
    {
        return $this->db
            ->select('code, code_name')
            ->from('cd_code')
            ->where('head_code', $head_code)
            ->where('use_yn', 'Y')
            ->where('code <>', '*')
            ->order_by('code', 'ASC')
            ->get()
            ->result();
    }

    /**
     * Insert material.
     */
    public function insert_material($data)
    {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update material.
     */
    public function update_material($material, $data)
    {
        return $this->db
            ->where('material', $material)
            ->where(
                "(delete_flag IS NULL OR delete_flag <> 'Y')",
                NULL,
                FALSE
            )
            ->update($this->table, $data);
    }

    /**
     * Soft delete material.
     */
    public function delete_material($material, $user)
    {
        $data = [
            'delete_flag' => 'Y',
            'delete_emp'  => substr($user, 0, 6),
            'delete_date' => date('Ymd')
        ];

        return $this->db
            ->where('material', $material)
            ->where(
                "(delete_flag IS NULL OR delete_flag <> 'Y')",
                NULL,
                FALSE
            )
            ->update($this->table, $data);
    }

    /**
     * Generate next Material Code.
     * Format: MAT00001
     */
    public function generate_material_code()
    {
        $query = $this->db->query("
            SELECT nextval('cd_material_code_seq') AS sequence_number
        ");

        $row = $query->row();

        if (!$row) {
            return FALSE;
        }

        return 'MAT' . str_pad(
            (string) $row->sequence_number,
            5,
            '0',
            STR_PAD_LEFT
        );
    }

}
