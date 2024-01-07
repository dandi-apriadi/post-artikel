<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model(['HomepageModel','UserModel']);

	}

	public function testing(){
		$data['title'] = "The Truth - Homepage	";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$this->load->view('templates/testing', $data);
		$this->load->view('templates/dashboard/footer', $data);

	}

	public function index(){
		// jika sudah login, tdk bisa kesini
		
		$data['title'] = "The Truth - Homepage	";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function about(){
		$data['title'] = "About - The Trust	";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/about');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function artikels(){
		$data['title'] = "News - The Trust	";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['beritaBaru'] = $this->HomepageModel->getBeritaBaru();

		$this->load->view('pages/homepage/news',$data);
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function kontak(){
		$data['title'] = "Kontak - The Trust";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/kontak');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function support(){
		$data['title'] = "Support - The Trust	";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('pages/homepage/support');
		$this->load->view('templates/dashboard/footer', $data);
	}

	public function artikel($id){
		$data['artikel'] = $this->HomepageModel->getBySlug($id); 
		$ipinfo = file_get_contents('http://ipinfo.io');
		$public_ip = json_decode($ipinfo);
	
		$ip = $this->HomepageModel->checkView($public_ip->ip,$data['artikel']->no_artikel);
		if($ip == true){
			$this->HomepageModel->addView($data = array(
				'ip_public' => $public_ip->ip,
				'no_artikel' => $data['artikel']->no_artikel
			));
		}
		$data['title'] = "Artikel - The Trust";
		$data['index'] = 1;
		$data['artikel'] = $this->HomepageModel->getBySlug($id); 
		$data['kode'] = $data['artikel']->no_artikel;
		$data['like'] = $this->HomepageModel->getLikes($data['artikel']->no_artikel);
		$data['comment'] = $this->HomepageModel->getComment($data['artikel']->no_artikel);

		if (isSessionDeclared('id_user')) {
			$data['liked'] = $this->HomepageModel->getLiked($data['artikel']->no_artikel);
		} else {
			$data['liked'] = "text-gray-800";
		}

		$data['view'] = $this->HomepageModel->getView($data['artikel']->no_artikel);
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$this->load->view('templates/dashboard/additionalNavbar', $data);
		$data['detail'] = $this->HomepageModel->getDetail($data['artikel']->no_artikel); 
		$data['penulis'] = $this->UserModel->getById($data['artikel']->userid);
		$template = $this->HomepageModel->getTemplate($data['artikel']->no_template);
		$this->load->view('artikel/post/'.$template->file_post,$data);
		$this->load->view('templates/dashboard/component', $data);
		$this->load->view('templates/dashboard/footer', $data);
	}


	public function login(){
		$data['title'] = "Login - The Trust	";

		$this->form_validation->set_rules('email', '', 'required', array(
			'required' => 'Tidak boleh kosong'
		));

		$this->form_validation->set_rules('password', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		if($this->form_validation->run()){
			$this->load->model('AuthModel');
			$email = htmlspecialchars($this->input->post('email'));
			$password = htmlspecialchars($this->input->post('password'));

			$cekData = $this->AuthModel->login($email);
			$cekVerified = $this->AuthModel->checkEmailVerified($email);

			if($cekData){
				if (password_verify($password, $cekData->password)) {
						if($cekVerified == 1){
							$_SESSION['id_user'] = $cekData->userid;
							$_SESSION['role'] = $cekData->role;
							$_SESSION['logged_in'] = true;
	
							redirect('/dashboard');
						}else{
							$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
								title: "Gagal",
								text: "Email anda Belum di Verifikasi",
								icon: "error",})</script>'
							);
							redirect('/login');
						}
					}else{
						$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
							title: "Gagal",
							text: "Password yang anda masukkan salah",
							icon: "error",})</script>'
						);
	
						redirect('/login');
					}
				}else{
					$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
						title: "Gagal",
						text: "Email anda tidak terdaftar",
						icon: "error",})</script>'
					);
	
					redirect('/login');
				}
		}else{
			$this->load->view('templates/dashboard/head', $data);
			$this->load->view('templates/dashboard/navbar_login', $data);
			$this->load->view('pages/homepage/login');
		}

	}

	public function register(){
		$data['title'] = "Registrasi - The Trust";

		$this->form_validation->set_rules('email', '', 'required|is_unique[users.email]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Email sudah terdaftar'
		));

		$this->form_validation->set_rules('password', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		$this->form_validation->set_rules('confirm-password', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		if($this->form_validation->run()){

			$this->load->model(['UserModel']);
            $password = htmlspecialchars(password_hash($this->input->post('password'), PASSWORD_DEFAULT));
			$userid = 'USR'. rand(1,99999). time();
			$email = htmlspecialchars($this->input->post('email'));
			$hash = password_hash($teksAsli, PASSWORD_DEFAULT);

			$base64Hash = base64_encode($hash);

			$token = preg_replace('/[^A-Za-z0-9]/', '', $base64Hash);

			$this->UserModel->add($data = array(
				'userid' => $userid,
				'email' => $email,
				'password' => $password,
				'token' => $token,
				'status' => 'active',
			),$detail = array(
				'userid' => $userid,
				'username' => $email
			));

			$baseUrl = base_url("/verification/".$token);

            $this->load->library('email');
            $this->email->from('dandigeming85@gmail.com', 'Admin The Truth');
            $this->email->to($data['email']);
            $this->email->subject('Verifikasi Pendaftaran');
            $this->email->message("
						<body style='font-family: 'Arial', sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;'>

						<div style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
							
							<div style='background-color: #3498db; color: #fff; text-align: center; padding: 20px 0;'>
								<h1>Verifikasi Pendaftaran</h1>
							</div>
					
							<div style='padding: 20px; text-align: center;'>
								<h2 style='color: #3498db;'>Verifikasi Pendaftaran Akun The Truth</h2>
								<p>Silakan Tekan Tombol Verifikasi di bawah untuk menyelesaikan pendaftaran akun anda.</p>
								
								<div style='text-align: center;'>
								<form action='$baseUrl' method='post'>
									<button style='display: inline-block; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; font-weight: bold;'>Verifikasi</button>
								</form>
								</div>
							</div>
					
							<div style='background-color: #3498db; color: #fff; text-align: center; font-size: 12px; padding: 10px;'>
								<p>&copy; 2023 Dandi Apriadi. All rights reserved.</p>
							</div>
					
						</div>
					
					</body>
            ");

            if ($this->email->send()) {
		        $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Silahkan Lakukan Verifikasi Menggunakan pesan yang sudah dikirimkan ke Alamat Email Anda",
                    icon: "succes",})</script>'
                );
            } else {
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Gagal",
                    text: "Verifikasi Email tidak dapat dikirim",
                    icon: "error",})</script>'
                );
            }

			redirect('/registrasi');

		}else{
			$this->load->view('templates/dashboard/head', $data);
			$this->load->view('templates/dashboard/navbar_login', $data);
			$this->load->view('pages/homepage/registrasi');
		}
	}

	public function forgot(){
		$data['title'] = "Forgot Password - The Trust";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar_login', $data);
		$this->load->view('pages/homepage/forgot');
	}

	public function newPassword(){
		$data['title'] = "New Password - The Trust";
		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar_login', $data);
		$this->load->view('pages/homepage/newpas');
	}

	public function verification($id){
		$data['title'] = "Verification - The Trust";
		$this->load->model(['UserModel']);

		$tokenTerdaftar = $this->UserModel->getBytoken($id);

        if($tokenTerdaftar == 1){
			$data['pesan'] = "Selamat Email Kamu Telah Berhasil Terverifikasi";
			$data['logo'] = base_url('assets/images/logo/logos/cilukba.gif');
			$data['button'] = "Login";
			$data['url'] = base_url('login');
            $this->UserModel->verifyToken(array(
                'verified' => "yes",
                'token' => "$id"
            ));
        }else{
			$data['button'] = "Hubungi Admin";
			$data['url'] = base_url('kontak');
			$url = base_url('kontak');
            $data['pesan'] = "Maaf Token Kamu tidak Terdaftar, jika terjadi masalah silahkan hubungi <a class='text-blue-400' href='$url'>admin</a>";
			$data['logo'] = base_url('assets/images/logo/logos/ywdh.gif');
        }

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar_login', $data);
		$this->load->view('pages/homepage/verification');
	}

}
