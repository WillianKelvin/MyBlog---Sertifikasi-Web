<?php
class About_me extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'About Me';
        $this->load->view('templates/header', $data);
        $this->load->view('about/index');
        $this->load->view('templates/footer');
    }
}
