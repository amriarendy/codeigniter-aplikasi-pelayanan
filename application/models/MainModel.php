<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class MainModel extends CI_Model
{   
    function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function register() {
        $post = $this->input->post();
        $data = [
            'nama'      => $post['nama'],
            'nik'       => $post['nik'],
            'password'  => $post['password'],
            'tgl_lahir' => $post['tgl_lahir'],
            'role'      => 'user',
        ];
        $query = $this->db->insert('users', $data);
        return $query;
    }
    
    public function fetch_session() {
        $session=$this->session->userdata('id');
        $query = $this->db->get_where('users', ['id' => $session])->row_array();
        return $query;
    }

    public function fetch_pelayanan_session() {
        $session=$this->session->userdata('id');
        $this->db->join('master_pelayanan', 'master_pelayanan.id_master_pelayanan = pelayanan.pelayanan', 'left');
        $this->db->join('users', 'users.id = pelayanan.civitas_pelayanan', 'left');
        // $this->db->join('dokumen', 'dokumen.id_layanan = pelayanan.id_pelayanan', 'left');
        $query = $this->db->get_where('pelayanan', ['civitas_pelayanan' => $session]);
        return $query;
    }

    public function bio_update() {
        $post = $this->input->post();
        $this->db->set('nama', $post['nama']);
        $this->db->set('tgl_lahir', $post['tgl_lahir']);
        $this->db->set('alamat', $post['alamat']);
        $this->db->where('id', $this->session->userdata('id'));
        $query = $this->db->update('users');
        return $query;
    }

    public function fetch_users() {
        $query = $this->db->get('users')->result();
        return $query;
    }

    public function get_where_users($id) {
        $query = $this->db->get_where('users', ['id' => $id])->row_array();
        return $query;
    }

    public function store_users() {
        $post = $this->input->post();
        $data = [
            'nama' => $post['nama'],
            'nik' => $post['nik'],
            'password' => $post['password'],
            'tgl_lahir' => $post['tgl_lahir'],
            'role' => 'admin',
        ];
        $query = $this->db->insert('users', $data);
        return $query;
    }

    public function update_users() {
        $post = $this->input->post();
        $this->db->set('nama', $post['nama']);
        $this->db->set('nik', $post['nik']);
        $this->db->set('tgl_lahir', $post['tgl_lahir']);
        $this->db->where('id', $post['id']);
        $query = $this->db->update('users');
        return $query;
    }

    public function destroy_users($id) {
        $query = $this->db->delete('users', ['id' => $id]);
        return $query;
    }

    public function fetch_pelayanan() {
        $this->db->join('master_pelayanan', 'master_pelayanan.id_master_pelayanan = pelayanan.pelayanan', 'left');
        $this->db->join('users', 'users.id = pelayanan.civitas_pelayanan', 'left');
        $query = $this->db->get('pelayanan')->result();
        return $query;
    }

    public function tambah_pelayanan() {
        $post = $this->input->post();
        $data = [
            'pelayanan' => $post['pelayanan'],
            'status_pelayanan' => "proses",
            'tanggal_pelayanan' => $post['tanggal_pelayanan'],
            'civitas_pelayanan' => $this->session->userdata('id'),
        ];
        $query = $this->db->insert('pelayanan', $data);

        $pelayanan_id     = $this->db->insert_id();

        $config['upload_path']          = './uploads/file_berkas/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
        $config['max_size']             = 100000;
        $this->load->library('upload',$config);
        $jumlah_berkas = count($_FILES['dokumen']['name']);

        for($i = 0; $i < $jumlah_berkas;$i++)
        {
            if(!empty($_FILES['dokumen']['name'][$i])){

                $_FILES['file']['name']     = $_FILES['dokumen']['name'][$i];
                $_FILES['file']['type']     = $_FILES['dokumen']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['dokumen']['size'][$i];
       
                if($this->upload->do_upload('file')){
                    
                    $fileData = $this->upload->data();

                    $uploadData[$i]['id_layanan'] = $pelayanan_id;
                    $uploadData[$i]['punya_dokumen'] = "users";
                    $uploadData[$i]['dokumen'] = $fileData['file_name']; 
                }
            }
        }
        return $this->db->insert_batch('dokumen',$uploadData);
    }

    public function get_where_dokumen($id) {
        $query = $this->db->get_where('dokumen', ['id_layanan' => $id])->result();
        return $query;
    }

    public function get_where_dokumen_by_users($id) {
        $this->db->where(['punya_dokumen' => "users"]);
        $query = $this->db->get_where('dokumen', ['id_layanan' => $id])->result();
        return $query;
    }

    public function get_where_dokumen_by_admin($id){
        $this->db->where(['punya_dokumen' => "admin"]);
        $query = $this->db->get_where('dokumen', ['id_layanan' => $id])->result();
        return $query;
    }

    public function get_where_pelayanan($id) {
        $this->db->join('master_pelayanan', 'master_pelayanan.id_master_pelayanan = pelayanan.pelayanan', 'left');
        $this->db->join('users', 'users.id = pelayanan.civitas_pelayanan', 'left');
        $query = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
        return $query;
    }

    public function update_pelayanan() {
        $post = $this->input->post();
        $this->db->set('status_pelayanan', $post['status_pelayanan']);
        $this->db->set('catatan_pelayanan', $post['catatan_pelayanan']);
        $this->db->where('id_pelayanan', $post['id_pelayanan']);
        $query = $this->db->update('pelayanan');
        // return $query;

        $pelayanan_id                   = $post['id_pelayanan'];
        $config['upload_path']          = './uploads/file_berkas/';
        $config['allowed_types']        = 'gif|jpg|png|pdf|docx';
        $config['max_size']             = 100000;
        $this->load->library('upload',$config);
        $jumlah_berkas = count($_FILES['dokumen']['name']);

        for($i = 0; $i < $jumlah_berkas;$i++)
        {
            if(!empty($_FILES['dokumen']['name'][$i])){

                $_FILES['file']['name']     = $_FILES['dokumen']['name'][$i];
                $_FILES['file']['type']     = $_FILES['dokumen']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['dokumen']['tmp_name'][$i];
                $_FILES['file']['size']     = $_FILES['dokumen']['size'][$i];
       
                if($this->upload->do_upload('file')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_layanan'] = $pelayanan_id;
                    $uploadData[$i]['punya_dokumen'] = "admin";
                    $uploadData[$i]['dokumen'] = $fileData['file_name']; 
                }
            }
        }
        $this->db->insert_batch('dokumen',$uploadData);
    }

    public function destroy_pelayanan($id) {
        $query = $this->db->delete('pelayanan', ['id_pelayanan' => $id]);
        return $query;
    }

    public function fetch_master_pelayanan() {
        $query = $this->db->get('master_pelayanan')->result();
        return $query;
    }

    public function get_where_master_pelayanan() {
        $query = $this->db->get_where('master_pelayanan')->row_array();
        return $query;
    }

    public function store_master_pelayanan() {
        $post = $this->input->post();
        $data = [
            'master_pelayanan' => $post['master_pelayanan'],
        ];
        $query = $this->db->insert('master_pelayanan', $data);
        return $query;
    }

    public function update_master_pelayanan() {
        $post = $this->input->post();
        $this->db->set('master_pelayanan', $post['master_pelayanan']);
        $this->db->where('id_master_pelayanan', $post['id_master_pelayanan']);
        $query = $this->db->update('master_pelayanan');
        return $query;
    }

    public function destroy_master_pelayanan($id) {
        $query = $this->db->delete('master_pelayanan', ['id_master_pelayanan ' => $id]);
        return $query;
    }
}