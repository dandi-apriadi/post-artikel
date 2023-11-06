<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'KasirModel', 'KaryawanModel', 'BarangModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

    public function tambah(){
        $data['title'] = "Tambah Transaksi";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$data['getKaryawan'] = $this->KaryawanModel->getById($_SESSION['id_user']);
		$dataKaryawan = $this->KaryawanModel->getById($_SESSION['id_user']);
        $data['barang'] = $this->BarangModel->getBarang($dataKaryawan->ownerId);
		
		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'karyawan')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarKaryawan', $data, true);
		$this->load->view('pages/transaksi/tambahtransaksi', $data);

		$this->load->view('templates/dashboard/footer');
    }

}