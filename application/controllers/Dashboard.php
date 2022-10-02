<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (empty($this->session->userdata('id'))) {
			$this->session->sess_destroy();
			$this->session->set_flashdata('message', '<div class="alert alert-danger text-center" role="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda Ditolak Karena Akses</div>');
			redirect('login');
		}
	}

	public function dashboard() {
		$model=$this->MainModel;
		$data = [
			'users' => $model->fetch_session(),
			'my_layanan' => $model->fetch_pelayanan_session()->result(),
			'master_pelayanan' => $model->fetch_master_pelayanan(),

		];
		$this->load->view('dashboard/dashboard', $data);
	}

	public function bioUpdate() {
		$model=$this->MainModel;
		$model->bio_update();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('dashboard');
	}

	public function pelayanan() {
		$model=$this->MainModel;
		$data = [
			'pelayanan' => $model->fetch_pelayanan(),
		];
		$this->load->view('dashboard/pelayanan/list-pelayanan', $data);
	}

	public function tambahPelayanan() {
		$model=$this->MainModel;
		$model->tambah_pelayanan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('dashboard');
	}

	public function editPelayanan($id) {
		$model=$this->MainModel;
		$data = [
			'pelayanan' => $model->get_where_pelayanan($id),
			'dokumen_users' => $model->get_where_dokumen_by_users($id),
			'dokumen_admin' => $model->get_where_dokumen_by_admin($id),
		];
		$this->load->view('dashboard/pelayanan/edit-pelayanan', $data);
	}

	public function detailPelayanan($id) {
		$model=$this->MainModel;
		$data = [
			'pelayanan' => $model->get_where_pelayanan($id),
			'dokumen_users' => $model->get_where_dokumen_by_users($id),
			'dokumen_admin' => $model->get_where_dokumen_by_admin($id),
		];
		$this->load->view('dashboard/pelayanan/detail-pelayanan', $data);
	}

	public function updatePelayanan() {
		$model=$this->MainModel;
		$model->update_pelayanan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('pelayanan');
	}

	public function deletePelayanan($id) {
		$model=$this->MainModel;
		$model->destroy_pelayanan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-trash"></i> Terhapus!</h4> Data Dihapus</div>');
		redirect('pelayanan');
	}

	public function master_pelayanan() {
		$model=$this->MainModel;
		$data = [
			'master_pelayanan' => $model->fetch_master_pelayanan(),
		];
		$this->load->view('dashboard/master-pelayanan', $data);
	}

	public function tambahMasterPelayanan() {
		$model=$this->MainModel;
		$model->store_master_pelayanan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('master-pelayanan');
	}

	public function updateMasterPelayanan() {
		$model=$this->MainModel;
		$model->update_master_pelayanan();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('master-pelayanan');
	}

	public function deleteMasterPelayanan($id) {
		$model=$this->MainModel;
		$model->destroy_master_pelayanan($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-trash"></i> Terhapus!</h4> Data Dihapus</div>');
		redirect('master-pelayanan');
	}

	public function users() {
		$model=$this->MainModel;
		$data = [
			'users' => $model->fetch_users(),
		];
		$this->load->view('dashboard/users/users', $data);
	}

	public function tambahUsers() {
		$model=$this->MainModel;
		$model->store_users();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('users');
	}

	public function updateUsers() {
		$model=$this->MainModel;
		$model->update_users();
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Berhasil Di Proses</div>');
		redirect('users');
	}

	public function deleteUsers($id) {
		$model=$this->MainModel;
		$model->destroy_users($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-trash"></i> Terhapus!</h4> Data Dihapus</div>');
		redirect('users');
	}

	public function logOut() {
		session_unset();
        session_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Anda Telah Logout</div>');
        redirect('login');
	}

	public function informasi() {
		$this->load->view('dashboard/info');
	}
}