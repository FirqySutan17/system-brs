<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function check_login($username, $password)
    {
        $this->db->where('user_nm', $username);
        $user = $this->db->get('sys_user')->row();

        if (!$user) {
            return false;
        }

        // Validasi password menggunakan hash
        if (!password_verify($password, $user->user_pass)) {
            return false;
        }

        return $user;
    }

    public function create_user($data)
    {
        $rawPassword = $data['user_pass'];

        $insertData = [
            'user_nm'       => $data['user_nm'],
            'user_pass'     => password_hash($rawPassword, PASSWORD_DEFAULT),
            'user_pass_raw' => $rawPassword,
            'full_name'     => $data['full_name'],
            'company'       => $data['company'],
            'plant'         => $data['plant'],
            'use_mk'        => $data['use_mk']
        ];

        return $this->db->insert('sys_user', $insertData);
    }

    public function migrate_existing_password()
    {
        $users = $this->db
            ->where('user_pass_raw IS NULL', null, false)
            ->get('sys_user')
            ->result();

        foreach ($users as $user) {

            // Password lama sebelum di-hash
            $rawPassword = (string) $user->user_pass;

            $data = [
                'user_pass'     => password_hash($rawPassword, PASSWORD_DEFAULT),
                'user_pass_raw' => $rawPassword
            ];

            $this->db
                ->where('user_nm', $user->user_nm)
                ->update('sys_user', $data);
        }

        return true;
    }
}