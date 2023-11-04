<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Register extends CI_Controller {


	public function index(){
		// jika sudah login, tdk bisa kesini
		if (isset($_SESSION['logged_in'])) {
			redirect('/dashboard');
		}
		
        if(isset($_POST['registrasi'])){
            $this->load->model(['UserModel', 'OwnerModel']);
            
            $totalUser = $this->UserModel->checkEmail($_POST['email']);

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $dataToken = $_POST['firstname'] . $_POST['lastname'] . $_POST['password'];
            $token = password_hash($dataToken,PASSWORD_DEFAULT);
            $newToken = str_replace('$', '%24', $token);
            $nama = $_POST['firstname'] . $_POST['lastname'];
            $email = $_POST['email'];
           
            $dataUser = array(
                'firstname' => "$_POST[firstname]",
                'lastname' => "$_POST[lastname]",
                'email' => "$_POST[email]",
                'password' => "$password",
                'verified_email' => "no",
                'role' => "owner",
                'token' => "$newToken"
            );
           
            $dataMailer = array(
                'nama' => $_POST['firstname'] . $_POST['lastname'],
                'email' => $_POST['email'],
                'token' => $newToken
            );

            if($totalUser == 0){
            $this->UserModel->add($dataUser);

            $id = $this->db->insert_id();
            $dataOwner = array(
                'userId' => $id,
                'nama_toko' => $_POST['store_name'], 
                'no_hp' => $_POST['phone_number'],
                'tipe_toko' => $_POST['store_type'],
                'slogan_toko' => $_POST['store_slogan'],
                'alamat_toko' => $_POST['store_address']
            );
            
            $this->OwnerModel->add($dataOwner);
            } else{
            $this->UserModel->update($dataUser);
            $id = $this->db->insert_id();
            $dataOwner = array(
                'userId' => $id,
                'nama_toko' => $_POST['store_name'], 
                'no_hp' => $_POST['phone_number'],
                'tipe_toko' => $_POST['store_type'],
                'slogan_toko' => $_POST['store_slogan'],
                'alamat_toko' => $_POST['store_address']
            );
            $this->OwnerModel->update($dataOwner);
            }
           
            $baseUrl = base_url("/verification/?token=$newToken");

            $this->load->library('email');
            $this->email->from('dandigeming85@gmail.com', 'Admin BaDag');
            $this->email->to($dataMailer['email']);
            $this->email->subject('Verifikasi Pendaftaran');
            $this->email->message("
                    <body style='font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 0;'>
                    <div style='max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);'>
                        <div style='background-color: #3498db; color: #fff; text-align: center; padding: 20px 0;'>
                            <h1>Verifikasi Pendaftaran</h1>
                        </div>
                        <div style='padding: 20px; text-align: center;'>
                            <h2 style='color: #3498db;'>Kode Verifikasi Pendaftaran Akun</h2>
                            <p>Silakan Tekan Tombol Verifikasi dibawah untuk menyelesaikan pendaftaran akun pada aplikasi BaDag.</p>
                            <div style='text-align: center;'>
                                <a href='$baseUrl' style='display: inline-block; padding: 10px 20px; background-color: #3498db; color: #fff; text-decoration: none; font-weight: bold;'>Verifikasi Akun</a>
                            </div>
                        </div>
                        <div style='background-color: #3498db; color: #fff; text-align: center; font-size: 12px; padding: 10px;'>
                            <p>&copy; 2023 BantuDagang. All rights reserved.</p>
                        </div>
                    </div>
                </body>
            ");

            if ($this->email->send()) {
		        $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Silahkan Lakukan Verifikasi Menggunakan pesan yang sudah dikirimkan ke Alamat Email Anda",
                    icon: "info",})</script>'
                );
            } else {
                // echo 'Email could not be sent.';
                // echo $this->email->print_debugger();
            }

        }

		$this->load->view('pages/registrasi');
	}

  	
    public function verify(){
        $this->load->model('UserModel');

        $token = str_replace('$', '%24', $_GET['token']);
        $tokenTerdaftar = $this->UserModel->getBytoken($token);

        if($tokenTerdaftar == 1){
            $data = array(
                'verified_email' => "yes",
                'token' => "$token"
            );
            $this->UserModel->verifyToken($data);
            $baseUrl = base_url("/");
            $view = "
            <div class='card-body'>
            <h2 class='card-title'>Selamat!</h2>
            <p class='card-text'>Email Anda berhasil diregistrasi.</p>
            <a href='$baseUrl' class='btn btn-primary'>Masuk</a>
            </div>
            ";
        }else{
            $view = "
            <div class='card-body'>
            <h2 class='card-title'>Verifikasi Gagal</h2>
            <p class='card-text'>Token Anda Tidak Terdaftar.</p>
            </div>
            ";
        }
        
        $data['token'] = $tokenTerdaftar;
        $data['view'] = $view;
		$this->load->view('pages/verify',$data);
    }

	public function regis_toko(){
		// jika sudah login, tdk bisa kesini
		if (isset($_SESSION['logged_in'])) {
			redirect('/dashboard');
		}

	}

}
