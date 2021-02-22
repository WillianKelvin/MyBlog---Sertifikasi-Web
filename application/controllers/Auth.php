<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        Parent::__construct();
        $this->load->model('User_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login Page';
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/templates/auth_footer');
        } else {
            //validasi ketika succes
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email'); //ambil inputan login
        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmail($email);

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', 'Wrong password!');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'This email has not been activated!');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', 'Email is not registered!');
            redirect('auth');
        }
    }

    public function register()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password too short'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $data['judul'] = 'Register Page';
            $this->load->view('auth/templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('auth/templates/auth_footer');
        } else {
            $this->User_model->register();
            $this->session->set_flashdata('message', 'Selamat! Akun anda sudah dibuat. Ayo Login');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('auth');
    }
}
