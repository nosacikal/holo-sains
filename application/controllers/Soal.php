<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Soal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Soal_Evaluasi_model', 'soal');
        cekLogin();
    }


    public function index()
    {
        $data['title'] = 'Soal Evaluasi';
        $data['user']  = getSessionGuru();
        $data['soal']  = $this->soal->getSoalEvaluasi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('soal/index');
        $this->load->view('templates/footer');
    }

    private function _uploadGambar()
    {
        $config['upload_path'] = './assets/img/soal/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['max_size']  = '2048';
        $config['file_name'] = 'soal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);

        $this->load->library('upload', $config);

        // if (!$this->upload->do_upload('gambar')) {
        //     $this->session->set_flashdata(
        //         'message',
        //         '<div class="alert alert-danger" role="alert">
        //         Gambar Harus Diisi
        //         </div>'
        //     );
        //     redirect('soal/tambah');
        // } else {
        //     return $this->upload->data('file_name');
        // }


        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        }

        return '';
    }

    public function tambah()
    {
        $this->load->model('SubTema_model', 'subtema');

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required|trim', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan harus diisi'
        ]);

        $this->form_validation->set_rules('jawaban_benar', 'Jawaban', 'required', [
            'required' => 'Jawaban harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_A', 'Pilihan A', 'required', [
            'required' => 'Pilihan A harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_B', 'Pilihan B', 'required', [
            'required' => 'Pilihan B harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_C', 'Pilihan C', 'required', [
            'required' => 'Pilihan C harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_D', 'Pilihan D', 'required', [
            'required' => 'Pilihan D harus diisi'
        ]);

        $data['title']   = 'Tambah Soal';
        $data['user']    = getSessionGuru();
        $data['subtema'] = $this->subtema->getSubTema();
        $data['option']  = [1, 2, 3, 4];
        $data['jawaban'] = ['A', 'B', 'C', 'D'];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('soal/tambah');
            $this->load->view('templates/footer');
        } else {

            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'pertanyaan' => $this->input->post('pertanyaan'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
                'pilihan_A' => $this->input->post('pilihan_A'),
                'pilihan_B' => $this->input->post('pilihan_B'),
                'pilihan_C' => $this->input->post('pilihan_C'),
                'pilihan_D' => $this->input->post('pilihan_D'),
                'gambar' => $this->_uploadGambar()
            ];

            $this->soal->createSoalEvaluasi($data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data Soal Evaluasi berhasil ditambahkan!
            </div>'
            );
            redirect('soal');
        }
    }

    public function edit($id)
    {
        $this->load->model('SubTema_model', 'subtema');

        $this->form_validation->set_rules('sub_tema', 'Sub Tema', 'required|trim', [
            'required' => 'Sub Tema harus diisi'
        ]);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required|trim', [
            'required' => 'Pertanyaan harus diisi'
        ]);

        $this->form_validation->set_rules('jawaban_benar', 'Jawaban', 'required', [
            'required' => 'Jawaban harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_A', 'Pilihan A', 'required', [
            'required' => 'Pilihan A harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_B', 'Pilihan B', 'required', [
            'required' => 'Pilihan B harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_C', 'Pilihan C', 'required', [
            'required' => 'Pilihan C harus diisi'
        ]);

        $this->form_validation->set_rules('pilihan_D', 'Pilihan D', 'required', [
            'required' => 'Pilihan D harus diisi'
        ]);

        $data['title']   = 'Edit Soal';
        $data['user']    = getSessionGuru();
        $data['soal']    = $this->soal->getSoalEvaluasi($id);
        $data['subtema'] = $this->subtema->getSubTema();
        $data['option']  = [1, 2, 3, 4];
        $data['jawaban'] = ['A', 'B', 'C', 'D'];

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('soal/edit');
            $this->load->view('templates/footer');
        } else {

            $gambar = $_FILES["gambar"]["name"];
            $file_ext = pathinfo($gambar, PATHINFO_EXTENSION);

            $config['upload_path'] = './assets/img/soal/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']  = '2048';
            $config['file_name'] = 'soal-' . date('ymd') . '-' . substr(md5(rand()), 0, 10) . '.' . $file_ext;

            $this->load->library('upload', $config);

            $data = [
                'id_sub_tema' => $this->input->post('sub_tema'),
                'pertanyaan' => $this->input->post('pertanyaan'),
                'pilihan_A' => $this->input->post('pilihan_A'),
                'pilihan_B' => $this->input->post('pilihan_B'),
                'pilihan_C' => $this->input->post('pilihan_C'),
                'pilihan_D' => $this->input->post('pilihan_D'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
            ];

            if ($gambar != null) {
                $data['gambar'] = $this->upload->data('file_name');

                if ($this->upload->do_upload('gambar')) {
                    $gambar_soal = $this->soal->getSoalEvaluasi($id);

                    if ($gambar_soal['gambar'] != null) {
                        $path = './assets/img/soal/' . $gambar_soal['gambar'];
                        unlink($path);
                    }
                    $this->db->set('gambar', $gambar_soal['gambar']);
                }
            }

            $this->soal->updateSoalEvaluasi($data, $id);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data Soal Evaluasi berhasil diubah!
            </div>'
            );
            redirect('soal');
        }
    }

    public function hapus($id)
    {
        $data['soal'] = $this->soal->getSoalEvaluasi($id);

        $this->soal->deleteSoalEvalusi($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-close" role="alert">
                Soal Evaluasi berhasil dihapus!
            </div>'
        );
        redirect('soal');
    }
}

/* End of file Soal.php */
