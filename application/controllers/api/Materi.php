<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Materi extends REST_Controller
{

    public function index_get()
    {
        $this->load->model('Materi_model', 'materi');
        $id = $this->get('id_materi');

        if ($id == null) {
            $materi = $this->materi->getMateri();
        } else {
            $materi = $this->materi->getMateri($id);
        }

        if ($materi) {
            $this->response([
                'status' => true,
                'message' => "Data materi ditemukan",
                'materi' => $materi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data materi tidak ditemukan"
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file Materi.php */
