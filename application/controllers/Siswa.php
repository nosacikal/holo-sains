<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model', 'siswa');
        cekLogin();
    }

    public function index()
    {
        // load library
        $this->load->library('pagination');

        // config
        $config['base_url'] = base_url() . 'siswa/index';
        $config['total_rows'] = $this->db->count_all_results('siswa');
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

        $data['title'] = 'Siswa';
        $data['user']  = getSessionGuru();
        $idKelas = $data['user']['id_kelas'];

        $data['siswa'] = $this->siswa->getSiswaWithKelas($idKelas);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('siswa/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        include APPPATH . 'libraries/PHPExcel.php';

        $data['title'] = 'Tambah Siswa';
        $data['user']  = getSessionGuru();
        $idKelas = $data['user']['id_kelas'];

        if (isset($_FILES["excel"]["name"])) {

            $config['upload_path'] = realpath('excel');
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['max_size'] = '10000';
            $config['encrypt_name'] = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                //upload gagal
                $this->session->set_flashdata('messahe', '<div class="alert alert-danger"><b> Import Data Siswa Gagal!</b> ' . $this->upload->display_errors() . '</div>');
                //redirect halaman
                redirect('siswa');
            } else {
                $data_upload = $this->upload->data();
                // @chmod($data_upload['full_path'], 0777);

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel   = $excelreader->load('excel/' . $data_upload['file_name']); // Load file yang telah diupload ke folder excel
                $sheet       = $loadexcel->getActiveSheet()->toArray(null, null, true, true, true);

                $data = [];

                $numrow = 1;
                foreach ($sheet as $row) {
                    if ($numrow > 1) {
                        array_push($data, [
                            'id_kelas' => $idKelas,
                            'nis' => $row['A'],
                            'nama_siswa' => $row['B'],
                            'password' => password_hash($row['C'], PASSWORD_DEFAULT),
                        ]);
                    }
                    $numrow++;
                }
                $this->db->db_debug = false;

                $insert = $this->db->insert_batch('siswa', $data);

                if (!$insert) {
                    $error = $this->db->error();

                    if ($error['code'] == 1062) {
                        //upload success
                        $this->session->set_flashdata('message', '<div class="alert alert-close alert-danger">Data Siswa gagal ditambahkan!</div>');
                        //redirect halaman
                        redirect('siswa');
                    }
                } else {
                    //delete file from server
                    unlink(realpath('excel/' . $data_upload['file_name']));

                    //upload success
                    $this->session->set_flashdata('message', '<div class="alert alert-close alert-success">Data Siswa berhasil ditambahkan!</div>');
                    //redirect halaman
                    redirect('siswa');
                }

                $this->db->db_debug = true;
            }
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('siswa/tambah');
            $this->load->view('templates/footer');
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nis', 'NIS', 'trim|required|integer', [
            'integer' => 'NIS harus berupa angka',
            'required' => 'NIS harus diisi'
        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required', [
            'required' => 'Nama Siswa harus diisi'
        ]);

        $data['title'] = 'Edit Siswa';
        $data['user']  = getSessionGuru();
        $data['siswa'] = $this->siswa->getSiswa($id);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('siswa/edit');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nis' => $this->input->post('nis'),
                'nama_siswa' => $this->input->post('nama_siswa')
            ];

            $this->siswa->updateSiswa($data, $id);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-close" role="alert">
                Data Siswa berhasil diubah!
            </div>'
            );
            redirect('siswa');
        }
    }

    public function hapus($id)
    {
        $data['siswa'] = $this->siswa->getSiswa($id);

        $this->siswa->deleteSiswa($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-close" role="alert">
                Siswa berhasil dihapus!
            </div>'
        );
        redirect('siswa');
    }

    public function export()
    {
        $data['siswa'] = $this->siswa->getSiswa();
        $data['user']  = getSessionGuru();
        $kelas = $data['user']['nama_kelas'];

        include APPPATH . 'libraries/PHPExcel.php';
        include APPPATH . 'libraries/PHPExcel/Writer/Excel2007.php';

        $excelreader = new PHPExcel();
        $excelreader->getProperties()->setCreator($data['user']['nama']);
        $excelreader->getProperties()->setLastModifiedBy($data['user']['nama']);
        $excelreader->getProperties()->setTitle("Siswa-Kelas-" . $kelas);

        $excelreader->setActiveSheetIndex(0);
        $excelreader->getActiveSheet()->setCellValue('A1', "NO");
        $excelreader->getActiveSheet()->setCellValue('B1', "NIS");
        $excelreader->getActiveSheet()->setCellValue('C1', "NAMA SISWA");

        $numrow = 2;
        $no = 1;

        foreach ($data['siswa'] as $siswa) {
            $excelreader->getActiveSheet()->setCellValue('A' . $numrow, $no++);
            $excelreader->getActiveSheet()->setCellValue('B' . $numrow, $siswa['nis']);
            $excelreader->getActiveSheet()->setCellValue('C' . $numrow, $siswa['nama_siswa']);

            $numrow++;
        }

        $filename = "Siswa-Kelas-" . $kelas . '.xlsx';

        $excelreader->getActiveSheet()->setTitle("Siswa-Kelas-" . $kelas);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header("Cache-Control: max-age=0");

        $writer = PHPExcel_IOFactory::createWriter($excelreader, 'Excel2007');
        $writer->save('php://output');

        exit;
    }
}

/* End of file Siswa.php */
