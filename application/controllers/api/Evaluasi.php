<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class Evaluasi extends REST_Controller
{

    public function index_get()
    {
        $this->load->model('Soal_Evaluasi_model', 'evaluasi');
        $id = $this->get('id_soal_evaluasi');


        if ($id == null) {
            $evaluasi = $this->evaluasi->getSoalEvaluasi();
        } else {
            $evaluasi = $this->evaluasi->getSoalEvaluasi($id);
        }

        if ($evaluasi) {
            $this->response([
                'status' => true,
                'message' => "Data materi ditemukan",
                'evaluasi' => $evaluasi
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data materi tidak ditemukan"
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = [
            'id_siswa' => $this->post('id_siswa'),
            'id_soal_evaluasi' => $this->post('id_soal_evaluasi'),
            'jawaban' => $this->post('jawaban'),
            'point' => $this->post('point')
        ];

        $insert = $this->db->insert('nilai_evaluasi', $data);

        if ($insert > 0) {
            $this->response([
                'status' => true,
                'message' => 'nilai berhasil ditambahkan'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => "nilai gagal ditambahkan"
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_delete()
    {
        $id_siswa = $this->delete('id_siswa');

        if ($id_siswa === null) {
            $this->response([
                'status' => false,
                'message' => "Data Membutuhkan id"
            ], REST_Controller::HTTP_OK);
        } else {
            $delete = $this->db->delete('nilai_evaluasi', ['id_siswa' => $id_siswa]);

            if ($delete > 0) {
                // ok
                $this->response([
                    'status' => true,
                    'id_materi' => $id_siswa,
                    'message' => 'Dihapus'
                ], REST_Controller::HTTP_OK);
            } else {
                // id not found
                $this->response([
                    'status' => false,
                    'message' => "Id tidak ditemukan"
                ], REST_Controller::HTTP_OK);
            }
        }
    }
}

/* End of file Soal_Evalusi.php */
