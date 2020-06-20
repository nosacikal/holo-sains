<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Simulasi extends REST_Controller
{

    public function index_get()
    {
        $this->load->model('Simulasi_model', 'simulasi');
        $id = $this->get('id_simulasi');

        if ($id == null) {
            $simulasi = $this->simulasi->getSimulasi();
        } else {
            $simulasi = $this->simulasi->getSimulasi($id);
        }

        if ($simulasi) {
            $this->response([
                'status' => true,
                'message' => "Data simulasi ditemukan",
                'simulasi' => $simulasi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data simulasi tidak ditemukan"
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file Simulasi.php */
