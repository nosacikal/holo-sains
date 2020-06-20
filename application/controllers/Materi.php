<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Materi_model', 'materi');
        cekLogin();
    }

    public function index()
    {
        $data['title'] = 'Materi';
        $data['user']  = getSessionGuru();
        $data['materi'] = $this->materi->getMateri();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('materi/index');
        $this->load->view('templates/footer');
    }

    private function _uploadGambar()
    {
        $config['upload_path'] = './assets/img/materi/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']  = '2048';
        $config['file_name'] = 'materi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }

        return '';
    }

    public function tambah()
    {
        $this->load->model('SubTema_model', 'subtema');

        // buat rules

        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|trim', [
            'required' => 'Judul Materi harus diisi'
        ]);

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('isi_materi', 'isi', 'required|trim', [
            'required' => 'Isi Materi harus diisi'
        ]);

        $data['title'] = 'Tambah Materi';
        $data['user']  = getSessionGuru();
        $data['subtema'] = $this->subtema->getSubTema();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('materi/tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'judul_materi' => $this->input->post('judul_materi'),
                'isi_materi' => $this->input->post('isi_materi'),
                'gambar' => $this->_uploadGambar(),
            ];

            $this->materi->createMateri($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data Materi berhasil ditambahkan!
            </div>'
            );
            redirect('materi');
        }
    }

    public function edit($id)
    {
        $this->load->model('SubTema_model', 'subtema');

        // buat rules

        $this->form_validation->set_rules('judul_materi', 'Judul Materi', 'required|trim', [
            'required' => 'Judul Materi harus diisi'
        ]);

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('isi_materi', 'isi', 'required', [
            'required' => 'Isi Materi harus diisi'
        ]);

        $data['title'] = 'Edit Materi';
        $data['user']  = getSessionGuru();
        $data['materi'] = $this->materi->getMateri($id);
        $data['subtema'] = $this->subtema->getSubTema();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('materi/edit');
            $this->load->view('templates/footer');
        } else {

            $gambar = $_FILES["gambar"]["name"];
            $file_ext = pathinfo($gambar, PATHINFO_EXTENSION);

            $config['upload_path'] = './assets/img/materi/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '2048';
            $config['file_name'] = 'materi-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.' . $file_ext;

            $this->load->library('upload', $config);

            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'judul_materi' => $this->input->post('judul_materi'),
                'isi_materi' => $this->input->post('isi_materi'),
            ];

            if ($gambar != null) {
                $data['gambar'] = $this->upload->data('file_name');

                if ($this->upload->do_upload('gambar')) {
                    $gambar_materi = $this->materi->getMateri($id);

                    if ($gambar_materi['gambar'] != null) {
                        $path = './assets/img/materi/' . $gambar_materi['gambar'];
                        unlink($path);
                    }
                    $this->db->set('gambar', $gambar_materi['gambar']);
                }
            }

            $this->materi->updateMateri($data, $id);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data materi berhasil diubah!
            </div>'
            );
            redirect('materi');
        }
    }

    public function hapus($id)
    {
        $data['materi'] = $this->materi->getMateri($id);

        if ($data['materi']['gambar'] != null) {
            $path = './assets/img/materi/' . $data['materi']['gambar'];
            unlink($path);
        }
        $this->materi->deleteMateri($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-close" role="alert">
        Materi berhasil dihapus!
    </div>'
        );
        redirect('materi');
    }
}

/* End of file Materi.php */
