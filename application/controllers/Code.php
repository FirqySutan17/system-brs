
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['session']);
        $this->load->helper(['url', 'form']);
        $this->load->model('Code_model', 'code_model');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
    }

    /**
     * Main Code Master page.
     */
    public function index()
    {
        $data['title'] = 'Code Master';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/code/list');
        $this->load->view('templates/footer');
    }

    /**
     * Return General Code categories.
     */
    public function get_heads()
    {
        $heads = $this->code_model->get_unique_head();

        $this->json_response([
            'status' => true,
            'data'   => $heads
        ]);
    }

    /**
     * Return code members by selected HEAD_CODE.
     */
    public function get_codes()
    {
        $head_code = trim((string) $this->input->get('head_code', true));
        $search    = trim((string) $this->input->get('search', true));

        if ($head_code === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Head Code is required.'
            ], 400);
        }

        $head = $this->code_model->get_head($head_code);

        if (!$head) {
            return $this->json_response([
                'status'  => false,
                'message' => 'General Code not found.'
            ], 404);
        }

        $limit = 500;
        $rows = $this->code_model->get_data_by_head(
            $head_code,
            $search,
            $limit,
            0
        );

        $total = $this->code_model->count_data_by_head(
            $head_code,
            $search
        );

        $this->json_response([
            'status' => true,
            'head'   => $head,
            'data'   => $rows,
            'total'  => $total
        ]);
    }

    /**
     * Return one record for edit.
     */
    public function get_detail()
    {
        $head_code = trim((string) $this->input->get('head_code', true));
        $code      = trim((string) $this->input->get('code', true));

        if ($head_code === '' || $code === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Head Code and Code are required.'
            ], 400);
        }

        $row = $this->code_model->get_by_pk($head_code, $code);

        if (!$row) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Code not found.'
            ], 404);
        }

        $this->json_response([
            'status' => true,
            'data'   => $row
        ]);
    }

    /**
     * Insert or update code.
     */
    public function save()
    {
        if (!$this->input->method(true) === 'POST') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid request method.'
            ], 405);
        }

        $mode      = trim((string) $this->input->post('mode', true));
        $head_code = trim((string) $this->input->post('head_code', true));
        $code      = trim((string) $this->input->post('code', true));
        $code_name = trim((string) $this->input->post('code_name', true));

        if (!in_array($mode, ['insert', 'update'], true)) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid save mode.'
            ], 400);
        }

        if ($head_code === '' || $code === '' || $code_name === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Head Code, Code, and Code Name are required.'
            ], 400);
        }

        if (strlen($head_code) > 8 || strlen($code) > 10 || strlen($code_name) > 40) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Some fields exceed the maximum allowed length.'
            ], 400);
        }

        if ($code === '*') {
            return $this->json_response([
                'status'  => false,
                'message' => 'The * code is reserved for General Code category.'
            ], 400);
        }

        // A member code must belong to an existing General Code category.
        if (!$this->code_model->get_head($head_code)) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Selected General Code category does not exist.'
            ], 400);
        }

        $use_yn = strtoupper(trim((string) $this->input->post('use_yn', true)));
        if (!in_array($use_yn, ['Y', 'N'], true)) {
            $use_yn = 'Y';
        }

        $data = [
            'code_name' => $code_name,
            'desc1'     => $this->post_nullable('desc1', 40),
            'desc2'     => $this->post_nullable('desc2', 40),
            'use_yn'    => $use_yn,
            'desc3'     => $this->post_nullable('desc3', 40),
            'desc4'     => $this->post_nullable('desc4', 200),
            'desc5'     => $this->post_nullable('desc5', 40),
            'desc6'     => $this->post_nullable('desc6', 40),
            'desc7'     => $this->post_nullable('desc7', 40),
            'desc8'     => $this->post_nullable('desc8', 40),
            'desc9'     => $this->post_nullable('desc9', 40),
            'desc0'     => $this->post_nullable('desc0', 40)
        ];

        if ($mode === 'insert') {
            if ($this->code_model->exists($head_code, $code)) {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'This Code already exists in the selected Head Code.'
                ], 409);
            }

            $data['head_code'] = $head_code;
            $data['code']      = $code;

            $success = $this->code_model->insert($data);
        } else {
            $old_head_code = trim((string) $this->input->post('old_head_code', true));
            $old_code      = trim((string) $this->input->post('old_code', true));

            if ($old_head_code === '' || $old_code === '') {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'Original Code identity is missing.'
                ], 400);
            }

            // Keep the composite primary key immutable during edit.
            if ($old_head_code !== $head_code || $old_code !== $code) {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'Head Code and Code cannot be changed during edit.'
                ], 400);
            }

            if (!$this->code_model->exists($old_head_code, $old_code)) {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'Code record no longer exists.'
                ], 404);
            }

            $success = $this->code_model->update(
                $old_head_code,
                $old_code,
                $data
            );
        }

        if (!$success) {
            $db_error = $this->db->error();

            return $this->json_response([
                'status'  => false,
                'message' => !empty($db_error['message'])
                    ? $db_error['message']
                    : 'Unable to save Code.'
            ], 500);
        }

        $this->json_response([
            'status'  => true,
            'message' => $mode === 'insert'
                ? 'Code has been created successfully.'
                : 'Code has been updated successfully.'
        ]);
    }

    /**
     * Delete code.
     */
    public function delete()
    {
        if ($this->input->method(true) !== 'POST') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid request method.'
            ], 405);
        }

        $head_code = trim((string) $this->input->post('head_code', true));
        $code      = trim((string) $this->input->post('code', true));

        if ($head_code === '' || $code === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Head Code and Code are required.'
            ], 400);
        }

        if ($code === '*') {
            return $this->json_response([
                'status'  => false,
                'message' => 'General Code category header cannot be deleted from this page.'
            ], 400);
        }

        if (!$this->code_model->exists($head_code, $code)) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Code not found.'
            ], 404);
        }

        $success = $this->code_model->delete($head_code, $code);

        if (!$success) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Unable to delete Code.'
            ], 500);
        }

        $this->json_response([
            'status'  => true,
            'message' => 'Code has been deleted successfully.'
        ]);
    }

    /**
     * Read optional text field and validate its length.
     */
    private function post_nullable($field, $max_length)
    {
        $value = trim((string) $this->input->post($field, true));

        if ($value === '') {
            return null;
        }

        return mb_substr($value, 0, $max_length, 'UTF-8');
    }

    /**
     * Standard JSON response.
     */
    private function json_response($payload, $http_status = 200)
    {
        return $this->output
            ->set_status_header($http_status)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($payload));
    }
}
