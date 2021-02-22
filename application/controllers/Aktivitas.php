<?php
class Aktivitas extends CI_Controller
{
    public function __construct()
    {
        Parent::__construct();
        $this->load->model('Model_aktivitas');
    }

    public function index()
    {
        $data['judul'] = 'Halaman Aktivitas';

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/myblog/aktivitas/index/';

        if ($this->session->userdata('keyword') == false) {
            $this->session->set_userdata('keyword', '');
        }


        if (isset($_POST['submit'])) {
            $data['cari'] = $_POST['cari'];
            $this->session->set_userdata('cari', $data['cari']);
        } else {
            $data['cari'] = $_SESSION['cari'];
        }
        $config['total_rows'] = $this->Model_aktivitas->countPosts($data['cari']);

        //$config['total_rows'] = $this->Model_aktivitas->countAllPost();

        $config['per_page'] = 5; //perhalaman 7 data
        //style pagination
        $config['full_tag_open'] = '<nav>
        <ul class="justify-content-center pagination">';
        $config['pull_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

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

        $config['attributes'] = ['class' => 'page-link'];

        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['kegiatan'] = $this->Model_aktivitas
            ->getPosts(
                $config['per_page'],
                $data['start'],
                $data['cari']
            );

        $this->load->view('templates/header', $data);
        $this->load->view('aktivitas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() //method utk menampilkan form tambah
    {
        if (logged_in()) {
            $data['judul'] = "Menambahkan Aktivitas";

            $this->form_validation->set_rules('judul', 'Judul Aktivitas', 'required');
            $this->form_validation->set_rules('isi', 'Isi Aktivitas', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('aktivitas/tambah');
                $this->load->view('templates/footer');
            } else {
                $this->Model_aktivitas->createAktivitas();
                redirect(base_url() . "aktivitas");
            }
        } else {
            redirect('auth');
        }
    }

    public function prosesTambah() //method utk memproses data inputan form tambah
    {
        $this->Model_aktivitas->tambahAktivitas();
        redirect(base_url() . "Aktivitas");
    }

    public function detail($id) //method utk memproses tampilan detail
    {
        $data['judul'] = 'Detail Activity';
        $data['post'] = $this->Model_aktivitas->getDetailPostById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('aktivitas/detail', $data);
        $this->load->view('templates/footer');
    }


    public function update($id) //method utk menampilkan form update
    {
        $data['judul'] = 'Update Kegiatan';
        $data['post'] = $this->Model_aktivitas->getPostById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('aktivitas/update', $data);
        $this->load->view('templates/footer');
    }


    public function prosesUpdate($id) //method untuk memproses hasil update dari form
    {
        $this->Model_aktivitas->updateAktivitas($id);
        redirect(base_url() . "aktivitas");
    }

    public function hapus($id) //method utk hapus
    {
        $this->Model_aktivitas->hapusAktivitas($id);
        redirect(base_url() . "aktivitas");
    }
}
