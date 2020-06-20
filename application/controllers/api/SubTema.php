<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class SubTema extends REST_Controller
{

    public function index_get()
    {
        $this->load->model('SubTema_model', 'subtema');
        $id = $this->get('id_sub_tema');

        if ($id == null) {
            $subTema = $this->subtema->getSubTema();
        } else {
            $subTema = $this->subtema->getSubTema($id);
        }

        if ($subTema) {
            $this->response([
                'status' => true,
                'data' => $subTema
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data sub tema tidak ditemukan"
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file Controllername.php */
