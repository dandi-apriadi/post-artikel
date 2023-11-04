<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	
	public function index(){
		// jika sudah login, tdk bisa kesini
		if (isset($_SESSION['logged_in'])) {
			redirect('/dashboard');
		}

		if (isset($_POST['login'])) {
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			$this->load->model('AuthModel');

			$cekData = $this->AuthModel->login($email);
			$cekVerified = $this->AuthModel->checkEmailVerified($email);

			if($cekData){
			if (password_verify($password, $cekData->password)) {
					if($cekVerified == 1){
						$_SESSION['id_user'] = $cekData->id;
						$_SESSION['role'] = $cekData->role;
						$_SESSION['logged_in'] = true;

						redirect('/dashboard');
					}else{
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Gagal",
							text: "Email anda Belum di Verifikasi",
							icon: "error",})</script>'
						);
					}
				}else{
					$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
						title: "",
						text: "Password salah",
						icon: "error",})</script>'
					);

					redirect('/');
				}
			}else{
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
					title: "",
					text: "Email salah",
					icon: "error",})</script>'
				);

				redirect('/');
			}
		}


		$this->load->view('pages/homepage');
	}

	public function regis_toko(){
		// jika sudah login, tdk bisa kesini
		if (isset($_SESSION['logged_in'])) {
			redirect('/dashboard');
		}


	}

}
