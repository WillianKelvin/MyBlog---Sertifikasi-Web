<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        logged_in();
    }
    public function index()
    {
        $data['judul'] = "My Blog - Dashboard";

        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
