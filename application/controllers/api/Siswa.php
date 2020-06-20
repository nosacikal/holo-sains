<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';;

class Siswa extends REST_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model', 'siswa');
    }


    public function index_get()
    {
        $this->load->model('Siswa_model', 'siswa');
        $id = $this->get('id_siswa');

        if ($id == null) {
            $siswa = $this->siswa->getSiswa();
        } else {
            $siswa = $this->siswa->getSiswa($id);
        }

        if ($siswa) {
            $this->response([
                'status' => true,
                'data' => $siswa
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => "Data siswa tidak ditemukan"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function login_post()
    {
        $nis = $this->post('nis');
        $password = $this->post('password');

        $user = $this->db->get_where('siswa', ['nis' => $nis])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'nis' => $user['nis'],
                    'id_kelas' => $user['id_kelas'],
                    'nama_siswa' => $user['nama_siswa']
                ];
                $this->response([
                    'status' => true,
                    'message' => "Berhasil Login",
                    'siswa' => $data
                ], REST_Controller::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => "Password Salah"
                ], REST_Controller::HTTP_OK);
            }
        } else {
            $this->response([
                'status' => false,
                'message' => "Data siswa tidak ditemukan"
            ], REST_Controller::HTTP_OK);
        }
    }
}

/* End of file Siswa.php */
