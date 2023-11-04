<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'OwnerModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

	// ini untuk halaman admin, hanya admin yang bisa akses halaman ini
	public function list(){
		$data['title'] = "Data Owner";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'admin')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
		$this->load->view('pages/owner/list', $data);

		$this->load->view('templates/dashboard/footer');
	}

	// API LIST -> Server Side Datatable
	public function listApi(){
		$list = $this->OwnerModel->get_datatables();
		$data = array();
		$no = $_POST['start'];

		foreach($list as $owner){
			$no++;
			$row = array();

			$row[] = $no;
			$row[] = $owner->firstname." ".$owner->lastname;
			$row[] = $owner->email;
			$row[] = $owner->nama_toko;

			$row[] = '-';

			$data[] = $row;
		}

		$output = array(
	        "draw" => $_POST['draw'],
	        "recordsTotal" => $this->OwnerModel->count_all(),
	        "recordsFiltered" => $this->OwnerModel->count_filtered(),
	        "data" => $data,
	    );

	    //output to json format
        echo json_encode($output);
	}



}