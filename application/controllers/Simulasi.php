<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Simulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Simulasi_model', 'simulasi');
        cekLogin();
    }

    public function index()
    {
        // load library
        $this->load->library('pagination');

        // config
        $config['base_url'] = base_url() . 'simulasi/index';
        $config['total_rows'] = $this->db->count_all_results('simulasi');
        $config['per_page'] = 10;

        // styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        // initialize
        $this->pagination->initialize($config);

        $data['title'] = 'Simulasi';
        $data['user']  = getSessionGuru();
        $data['start'] = $this->uri->segment(3);
        $data['simulasi'] = $this->simulasi->getSimulasiLimit($config['per_page'], $data['start']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('simulasi/index');
        $this->load->view('templates/footer');
    }

    private function _uploadVideo()
    {
        $config['upload_path'] = './assets/img/simulasi/';
        $config['allowed_types'] = 'mp4';
        $config['max_size']  = '2048';
        $config['file_name'] = 'simulasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('video')) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                video Harus Diisi
                </div>'
            );
            redirect('simulasi/tambah');
        } else {
            return $this->upload->data('file_name');
        }
    }

    public function tambah()
    {

        $this->load->model('SubTema_model', 'subtema');

        $this->form_validation->set_rules('judul_simulasi', 'Judul Simulasi', 'required|trim', [
            'required' => 'Judul Simulasi harus diisi'
        ]);

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('keyword', 'Keyword', 'required', [
            'required' => 'Keyword Hologram harus diisi'
        ]);

        $data['title'] = 'Tambah Simulasi';
        $data['user']  = getSessionGuru();
        $data['subtema'] = $this->subtema->getSubTema();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('simulasi/tambah');
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'judul_simulasi' => $this->input->post('judul_simulasi'),
                'keyword' => $this->input->post('keyword'),
                'video' => $this->_uploadVideo()
            ];

            $this->simulasi->createSimulasi($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data Simulasi berhasil ditambahkan!
            </div>'
            );
            redirect('simulasi');
        }
    }

    public function edit($id)
    {
        $this->load->model('SubTema_model', 'subtema');

        $this->form_validation->set_rules('judul_simulasi', 'Judul Simulasi', 'required|trim', [
            'required' => 'Judul Simulasi harus diisi'
        ]);

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('keyword', 'Keyword', 'required', [
            'required' => 'Keyword Hologram harus diisi'
        ]);

        $data['title'] = 'Edit Simulasi';
        $data['user']  = getSessionGuru();
        $data['simulasi'] = $this->simulasi->getSimulasi($id);
        $data['subtema'] = $this->subtema->getSubTema();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('simulasi/edit');
            $this->load->view('templates/footer');
        } else {

            $video = $_FILES["video"]["name"];
            $file_ext = pathinfo($video, PATHINFO_EXTENSION);

            $config['upload_path'] = './assets/img/simulasi/';
            $config['allowed_types'] = 'mp4';
            $config['max_size']  = '2048';
            $config['file_name'] = 'simulasi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.' . $file_ext;

            $this->load->library('upload', $config);

            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'judul_simulasi' => $this->input->post('judul_simulasi'),
                'keyword' => $this->input->post('keyword'),
            ];

            if ($video != null) {
                $data['video'] = $this->upload->data('file_name');

                if ($this->upload->do_upload('video')) {
                    $video_simulasi = $this->simulasi->getSimulasi($id);

                    if ($video_simulasi['video'] != null) {
                        $path = './assets/img/simulasi/' . $video_simulasi['video'];
                        unlink($path);
                    }
                    $this->db->set('video', $video_simulasi['video']);
                }
            }

            $this->simulasi->updateSimulasi($data, $id);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data simulasi berhasil diubah!
            </div>'
            );
            redirect('simulasi');
        }
    }

    public function hapus($id)
    {
        $data['simulasi'] = $this->simulasi->getSimulasi($id);

        if ($data['simulasi']['video'] != null) {
            $path = './assets/img/simulasi/' . $data['simulasi']['video'];
            unlink($path);
        }
        $this->simulasi->deleteSimulasi($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-close" role="alert">
        Simulasi berhasil dihapus!
    </div>'
        );
        redirect('simulasi');
    }
}

/* End of file Simulasi.php */
