<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('nip')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|integer');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Holo Sains";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nip = $this->input->post('nip');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('guru', ['nip' => $nip, 'password' => $password])->row_array();

        // user ada
        if ($user) {
            // jika user aktif
            $data = ['nip' => $user['nip']];
            $this->session->set_userdata($data);
            redirect('admin');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    NIP atau passowrd salah
                </div>'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-close" role="alert">
            Anda sudah logout!
        </div>'
        );
        redirect('auth');
    }
}

/* End of file Auth.php */
