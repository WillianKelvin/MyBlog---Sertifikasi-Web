<?php
class Model_aktivitas extends CI_Model
{

    public function createAktivitas() //mengupload ke dtbase
    {
        $image = $_FILES['image'];
        if ($image = '') {
        } else {
            $config['upload_path'] = './image/imgjourney';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                echo "Upload gagal";
                die();
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'image' => $image
        );
        $this->db->insert('kegiatan', $data);
    }

    public function tambahAktivitas() //menambahkan ke dtbase
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi'),
            'image' => $this->_uploadImage()
        );

        $this->db->insert('kegiatan', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambahkan!');
    }

    private function _uploadImage() //upload gambar
    {
        $config['upload_path']          = './upload/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
            echo "berhasil";
        }

        return "default.jpg";
    }


    public function getAllPost($limit, $start) //menampilkan seluruh kegiatan dr dtbase
    {
        return $this->db
            ->select("id, judul, SUBSTRING(isi, 1, 200) as isi,image")
            ->order_by('id', 'asc')
            ->get('kegiatan', $limit, $start)
            ->result_array();
    }

    public function getPosts($limit, $start, $cari = null)  //menampilkan hasil pencarian
    { //method utk search
        return $this->db
            ->select("id, judul, SUBSTRING(isi, 1, 200) as isi, image")
            ->like('judul', $cari)
            ->order_by('id', 'asc')
            ->get('kegiatan', $limit, $start)
            ->result_array();
    }

    public function countPosts($cari = null) //menghitung hasil pencarian dr dtbase
    {
        return $this->db->like('judul', $cari)
            ->from('kegiatan')
            ->count_all_results();
    }

    // public function countAllPost() //menghitung 
    // {
    //     return $this->db->get('kegiatan')->num_rows();
    // }


    public function getPostById($id) //mengambil kegiatan berdasarkan id utk form update
    {
        return $this->db
            ->select("id, judul, isi, image")
            ->where('id', $id)
            ->get('kegiatan')
            ->result_array();
    }


    public function updateAktivitas($id) //mengupdate kegiatan ke dtbase
    {
        $data = array(
            'judul' => $this->input->post('judul'),
            'isi' => $this->input->post('isi')
        );

        $this->db
            ->where('id', $id)
            ->update('kegiatan', $data);
    }

    public function hapusAktivitas($id) //memproses hapus ke dtbase
    {
        $this->db
            ->where('id', $id)
            ->delete('kegiatan');
    }

    public function getDetailPostById($id) //menampilkan detail kegiatan berdasarkan id dr dtbase
    {
        return $this->db
            ->select("id,judul,isi,image")
            ->where('id', $id)
            ->get('kegiatan')
            ->result_array();
    }
}
