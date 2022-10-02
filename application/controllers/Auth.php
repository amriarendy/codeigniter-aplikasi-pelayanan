<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index() {
		$this->load->view('auth/login');
	}

	public function login() {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['nik' => $nik])->row_array();

        if ($user) {

                if ($password == $user['password']) {
                    $data = [
                        'id' => $user['id'],
                        'nama' => $user['nama'],
                        'nik' => $user['nik'],
                        'tgl_lahir' => $user['tgl_lahir'],
                        'role' => $user['role'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Login Sukses!</h4>
                        Selamat Anda Berhasil Login.</div>');
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" align="center">
                    Password Salah!</div>');
                    redirect('login');
                }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" align="center">
            Akun Belum Terdaftar</div>');
            redirect('login');
        }
	}

	public function daftar() {
		$model=$this->MainModel;
        $this->form_validation->set_rules('nik', 'Nomor NIK', 'required|is_unique[users.nik]',[
            'required' => 'Input wajib di isi',
            'is_unique' => 'Data Sudah Ada',
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/daftar');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert" align="center">
            Gagal! Periksa Kembali Form Input Anda</div>');
            } else {
            $model->register();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert" align="center">
            Success! Akun Anda Berhasil Dibuat</div>');
            redirect('login');
        }
	}
}
