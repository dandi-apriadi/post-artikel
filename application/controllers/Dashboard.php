<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel']);
		
		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}
	
	public function index(){
		$data['title'] = "The Truth - Dashboard";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){
			if($data['getUser']->role == 'admin'){
				$data['page'] = 'dashboard';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/index', $data);
				$this->load->view('templates/dashboard/footer');
			}elseif($data['getUser']->role == 'pengguna'){
				$data['page'] = 'dashboard';
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
				$this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('pages/dashboard/index', $data);
				$this->load->view('templates/dashboard/footer');
			} 
		}else{
			redirect('inactive');
		}
	}

	public function profile(){
		$data['title'] = "The Truth - Profile";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->status == 'active'){
			$data['page'] = 'profile';
			$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
			$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('pages/dashboard/profile', $data);
			$this->load->view('templates/dashboard/footer');
		}else{
			redirect('inactive');
		}
	}
	
	public function inactive(){
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
		if($data['getUser']->status == 'suspend'){
			$data['title'] = "The Truth - Suspend";
			$this->load->view('templates/dashboard/navbar_login', $data);
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
			$data['pesan'] = "Email Kamu Telah di Suspend Oleh Admin";
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
			$data['text'] = 'Akun Telah di Suspend';
			$this->load->view('pages/dashboard/suspend', $data);
		}elseif($data['getUser']->status == 'blocked'){
			$data['title'] = "The Truth - Blocked";
			$this->load->view('templates/dashboard/navbar_login', $data);
			$data['text'] = 'Akun Telah di Blokir';
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
			$data['pesan'] = "Maaf Akun Anda Telah di Blokir Oleh Admin dengan Alasan Melanggar Ketentuan Pengguna";
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
			$this->load->view('pages/dashboard/suspend', $data);
		}elseif($data['getUser']->status == 'active'){
			redirect('dashboard');
		}
	}
	
	public function logout(){
		session_destroy();
		redirect('/');
	}


}
