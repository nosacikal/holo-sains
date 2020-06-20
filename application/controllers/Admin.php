<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cekLogin();
    }

    public function index()
    {
        $this->load->model('Materi_model', 'materi');
        $this->load->model('Simulasi_model', 'simulasi');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Soal_Evaluasi_model', 'soal');

        $data['title'] = 'Monitoring';
        $data['user']  = getSessionGuru();
        $data['materi'] = $this->db->count_all_results('materi');
        $data['simulasi'] = $this->db->count_all_results('simulasi');
        $data['soal'] = $this->db->count_all_results('soal_evaluasi');

        $idKelas = $data['user']['id_kelas'];
        $data['siswa'] = $this->db->where('id_kelas', $idKelas)->count_all_results("siswa");

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }
}

/* End of file Admin.php */
