<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*

Profil Controller

# semua yang berhubungan dengan profil
# Profil Kasir, Profil Owner Toko, dan Profil Teknisi

*/

class Profil extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel', 'KaryawanModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

    public function teknisi(){
        $data['title'] = "Profil";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
        $data['getKaryawan'] = $this->KaryawanModel->getById($_SESSION['id_user']);

		// jika bukan teknisi yg login, maka tdk bisa kesini
		if ($data['getKaryawan']->status_karyawan != 'teknisi')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/karyawan/profilTeknisi', $data);

		$this->load->view('templates/dashboard/footer');
    }

}