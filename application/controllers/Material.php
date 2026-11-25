
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('Material_model');
        $this->load->helper(['url', 'form']);
    }

    /**
     * Main page.
     */
    public function index()
    {
        $data['title'] = 'Material Code';
        $data['current_page'] = 'material_code';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/material/list', $data);
        $this->load->view('templates/footer');
    }

    /**
     * Material list.
     */
    public function get_materials()
    {
        $filters = [
            'search'   => trim((string) $this->input->get('search', TRUE)),
            'material' => trim((string) $this->input->get('material', TRUE)),
            'class1'   => trim((string) $this->input->get('class1', TRUE)),
            'class2'   => trim((string) $this->input->get('class2', TRUE))
        ];

        $rows = $this->Material_model->get_material_list($filters);

        return $this->json_response([
            'status' => true,
            'data'   => $rows,
            'total'  => count($rows)
        ]);
    }

    /**
     * Material detail.
     */
    public function get_material()
    {
        $material = trim((string) $this->input->get('material', TRUE));

        if ($material === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material code is required.'
            ], 422);
        }

        $row = $this->Material_model->get_by_material($material);

        if (!$row) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material not found.'
            ], 404);
        }

        return $this->json_response([
            'status' => true,
            'data'   => $row
        ]);
    }

    /**
     * Dropdown data.
     */
    public function get_dropdowns()
    {
        return $this->json_response([
            'status' => true,
            'data' => [
                'class1' => $this->Material_model->get_dropdown_codes('GM'),
                'mat_unit' => $this->Material_model->get_dropdown_codes('UT')
            ]
        ]);
    }

    /**
     * Get next Material Code.
     */
    public function get_next_material_code()
    {
        if ($this->input->method(TRUE) !== 'GET') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid request method.'
            ], 405);
        }

        $material = $this->Material_model->generate_material_code();

        if ($material === FALSE) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Failed to generate Material Code.'
            ], 500);
        }

        return $this->json_response([
            'status'   => true,
            'material' => $material
        ]);
    }

    /**
     * Insert / Update.
     */
    public function save()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid request method.'
            ], 405);
        }

        $material = strtoupper(
            trim((string) $this->input->post('material', TRUE))
        );

        $mode = trim((string) $this->input->post('mode', TRUE));

        if ($material === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material Code is required.'
            ], 422);
        }

        if (strlen($material) > 12) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material Code maximum length is 12 characters.'
            ], 422);
        }

        if (!in_array($mode, ['insert', 'update'], TRUE)) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid save mode.'
            ], 422);
        }

        if (
            $mode === 'insert' &&
            !preg_match('/^MAT[0-9]{5,}$/', $material)
        ) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid generated Material Code.'
            ], 422);
        }

        $user = (string) $this->session->userdata('user_nm');
        $today = date('Ymd');

        $data = [
            'material'         => $material,
            'material_name'    => $this->post_value('material_name'),
            'material_sname'   => $this->post_value('material_sname'),
            'remark'           => $this->post_value('remark'),

            'class1'           => $this->post_value('class1'),
            'balance_control'  => $this->post_value('balance_control'),
            'import_class'     => $this->post_value('import_class'),
            'class2'           => $this->post_value('class2'),
            'class3'           => $this->post_value('class3'),

            'mat_spec'         => $this->post_value('mat_spec'),
            'mat_size'         => $this->post_value('mat_size'),
            'mat_unit'         => $this->post_value('mat_unit'),

            'unit_price'       => $this->post_value('unit_price'),
            'before_unit_price'=> $this->post_value('before_unit_price'),
            'vat_rate'         => $this->post_value('vat_rate'),
            'delivery_day'     => $this->post_value('delivery_day'),

            'contract_group'   => $this->post_value('contract_group'),
            'yn_spare' => $this->post_value('yn_spare'),

            'optimum_qty'      => $this->post_value('optimum_qty'),
            'formula'          => $this->post_value('formula'),
            'bl_allowance'     => $this->post_value('bl_allowance'),
            'rcv_allowance'    => $this->post_value('rcv_allowance'),
            'last_in_date'     => $this->post_value('last_in_date')
        ];

        // Numeric validation.
        $numeric_fields = [
            'unit_price',
            'before_unit_price',
            'vat_rate',
            'delivery_day',
            'optimum_qty',
            'bl_allowance',
            'rcv_allowance'
        ];

        foreach ($numeric_fields as $field) {
            if (
                $data[$field] !== NULL &&
                !is_numeric($data[$field])
            ) {
                return $this->json_response([
                    'status' => false,
                    'message' => ucfirst(
                        str_replace('_', ' ', $field)
                    ) . ' must be numeric.'
                ], 422);
            }
        }

        // Balance Control validation.
        if (
            $data['balance_control'] !== NULL &&
            !in_array($data['balance_control'], ['Y', 'N'], TRUE)
        ) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Balance Control must be Y or N.'
            ], 422);
        }

        // Last In Date validation.
        if (
            $data['last_in_date'] !== NULL &&
            !preg_match('/^\d{8}$/', $data['last_in_date'])
        ) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Last In Date must use YYYYMMDD format.'
            ], 422);
        }

        if ($mode === 'insert') {
            if ($this->Material_model->exists_material($material)) {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'Material Code already exists.'
                ], 409);
            }

            $data['delete_flag'] = 'N';
            $data['reg_emp'] = $user;
            $data['reg_date'] = $today;

            $success = $this->Material_model->insert_material($data);

            $message = 'Material created successfully.';
        } else {
            if (!$this->Material_model->get_by_material($material)) {
                return $this->json_response([
                    'status'  => false,
                    'message' => 'Material not found.'
                ], 404);
            }

            unset($data['material']);

            $data['mod_emp'] = $user;
            $data['mod_date'] = $today;

            $success = $this->Material_model->update_material(
                $material,
                $data
            );

            $message = 'Material updated successfully.';
        }

        if (!$success) {
            log_message('error', 'Material save error: ' . json_encode($this->db->error()));

            return $this->json_response([
                'status'  => false,
                'message' => 'Failed to save material. Please check application log.'
            ], 500);
        }

        return $this->json_response([
            'status'    => true,
            'message'   => $message,
            'material'  => $material
        ]);
    }

    /**
     * Soft delete.
     */
    public function delete()
    {
        if ($this->input->method(TRUE) !== 'POST') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Invalid request method.'
            ], 405);
        }

        $material = trim((string) $this->input->post('material', TRUE));
        $user = (string) $this->session->userdata('user_nm');

        if ($material === '') {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material Code is required.'
            ], 422);
        }

        if (!$this->Material_model->get_by_material($material)) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Material not found.'
            ], 404);
        }

        $success = $this->Material_model->delete_material(
            $material,
            $user
        );

        if (!$success) {
            return $this->json_response([
                'status'  => false,
                'message' => 'Failed to delete material.'
            ], 500);
        }

        return $this->json_response([
            'status'  => true,
            'message' => 'Material deleted successfully.'
        ]);
    }

    /**
     * POST value helper.
     */
    private function post_value($field)
    {
        $value = $this->input->post($field, TRUE);

        if ($value === NULL) {
            return NULL;
        }

        $value = trim((string) $value);

        return $value === '' ? NULL : $value;
    }

    /**
     * JSON response.
     */
    private function json_response($data, $http_code = 200)
    {
        $data['csrf_hash'] = $this->security->get_csrf_hash();

        return $this->output
            ->set_status_header($http_code)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($data));
    }
}
