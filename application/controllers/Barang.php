<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'BarangModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

	public function index(){
        $data['title'] = "Daftar Barang";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
        $data['barang'] = $this->BarangModel->getBarang();

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/barang/daftar', $data);

		$this->load->view('templates/dashboard/footer');
	}

    public function detail($id){
        $data['title'] = "Detail Barang";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
        $data['barang'] = $this->BarangModel->getbyId($id);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/barang/detail', $data);

		$this->load->view('templates/dashboard/footer');
    }

    public function tambah(){
        $data['title'] = "Tambah Barang";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

        $this->form_validation->set_rules('namaBarang', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));
		$this->form_validation->set_rules('harga', '', 'required|numeric', array(
			'required' => 'Tidak boleh kosong',
			'numeric' => 'Mohon Masukkan Inputan Berupa Angka',
		));
		$this->form_validation->set_rules('stok', '', 'required|numeric', array(
			'required' => 'Tidak boleh kosong',
			'numeric' => 'Mohon Masukkan Inputan Berupa Angka',
		));
		$this->form_validation->set_rules('deskripsi', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));
        $this->form_validation->set_rules('gambar', '', 'callback_checkGambar');

        if($this->form_validation->run()){

            $config['upload_path']   = 'assets/images/barang/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size']      = 3000000; // 3mb
            $config['file_name']     = time().'_'.rand(); // random filename
            $this->load->library('upload', $config);
 
            $this->upload->do_upload('gambar');
            $thumbnail = $this->upload->data();

            $namaBarang = $this->input->post('namaBarang');      
            $harga = $this->input->post('harga');
            $stok = $this->input->post('stok');
            $deskripsi = $this->input->post('deskripsi');

            $dataBarang = array(
                'userId' => $_SESSION['id_user'],
                'nama_barang' => $namaBarang,
                'harga' => $harga,
                'stok' => $stok,
                'gambar' => $thumbnail['file_name'],
                'deskripsi' => nl2br($deskripsi)
            );

            $this->BarangModel->addBarang($dataBarang);

			$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
				title: "Berhasil",
				text: "Data Barang diTambahkan",
				icon: "success",})</script>'
			);

            redirect('barang/tambah-barang');
		}else{
            $this->load->view('templates/dashboard/head', $data);
            $this->load->view('templates/dashboard/navbar', $data);

            $data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
            $this->load->view('pages/barang/tambah', $data);

            $this->load->view('templates/dashboard/footer');
        }
    }

    public function checkGambar($str){
        $allowed_mime_type_arr = array('image/jpeg', 'image/png');
        $mime = get_mime_by_extension($_FILES['gambar']['name']);
        $maxsize = 3000000; // 3 mb
 
        if (isset($_FILES['gambar']['name']) && $_FILES['gambar']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                if ($_FILES['gambar']['size'] >= $maxsize) {
                    $this->form_validation->set_message('checkGambar', 'Terlalu besar. Maximal 3 MB');
                    return false;
                }else{
                    return true;
                }
            }else{
                $this->form_validation->set_message('checkGambar', 'Harus berupa jpg atau png');
                return false;
            }
        }else{
            $this->form_validation->set_message('checkGambar', 'Tidak boleh kosong');
            return false;
        }
    }

}