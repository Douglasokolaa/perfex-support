<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Products extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index($id)
    {
        if (!$this->input->is_ajax_request()) {
            ajax_access_denied();
            show_404();
        }

        $this->load->library('envato');
        $data = [];
        $purchaseCode = get_custom_field_value($id, 'tickets_purchase_code', 'tickets');
        $pCodeData = $this->envato->validate_purchase($purchaseCode);

        if ($pCodeData['successful']) {
            $data['item'] = $pCodeData['data'];
            return $this->load->view('item', $data);
        }
        return '<div class="alert alert-danger">' . $pCodeData['message'] . '</div>';
    }
}
