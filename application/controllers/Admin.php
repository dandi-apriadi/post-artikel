<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'UserModel','AdminModel','BeritaModel']);

        if (!isset($_SESSION['logged_in'])) {
            redirect('/');
        }

		// $data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		// if($data['getUser']->role != 'admin')
		// 	redirect('/');
	}

    public function templateManagement(){
		$data['page'] = 'template-management';
		$data['title'] = "The Truth - Template Management";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		
		$this->form_validation->set_rules('nama_template', '', 'required', array(
		'required' => 'Tidak boleh kosong',
		));

		$this->form_validation->set_rules('deskripsi', '', 'required', array(
			'required' => 'Tidak boleh kosong',
		));

		$this->form_validation->set_rules('file_artikel', '', 'required|is_unique[template.file_artikel]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Nama File telah digunakan',
		));

		$this->form_validation->set_rules('file_post', '', 'required|is_unique[template.file_post]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Nama File telah digunakan',
		));

		$this->form_validation->set_rules('file_create', '', 'required|is_unique[template.file_create]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Nama File telah digunakan',
		));
		$this->form_validation->set_rules('file_editing', '', 'required|is_unique[template.file_editing]', array(
			'required' => 'Tidak boleh kosong',
			'is_unique' => 'Nama File telah digunakan',
		));

		$this->form_validation->set_rules('sampul_template', '', 'callback_checkThumbnail');

		if($this->form_validation->run()){
			$noTemplate = rand(1,999900).'-'.time();
			$slug1 = slug_seo(htmlspecialchars($this->input->post('nama_template')));
			$slug = $this->BeritaModel->cekSlug($slug1);
			
			// // Upload Sampul
			$config['upload_path']   = 'assets/images/templateartikel/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size']      = 5000000; // 5mb
			$config['file_name']     = time() . '_' . rand();
			$this->load->library('upload', $config);
			$this->upload->do_upload('sampul_template');
			$Sampul = $this->upload->data();

			$this->AdminModel->addTemplate($data = array(
				'no_template' => $noTemplate,
				'nama_template' => htmlspecialchars($this->input->post('nama_template')),
				'deskripsi' => htmlentities($this->input->post('deskripsi')),
				'slug' => $slug,
				'userid' => $_SESSION['id_user'],
				'sampul_template' => $Sampul['file_name'],
				'file_artikel' => htmlspecialchars($this->input->post('file_artikel')),
				'file_post' => htmlspecialchars($this->input->post('file_post')), 
				'file_create' => htmlspecialchars($this->input->post('file_create')), 
				'file_editing' => htmlspecialchars($this->input->post('file_editing'))
			));

			$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
				title: "Berhasil",
				text: "Template Berhasil diBuat",
				icon: "success",})</script>'
			);
			redirect('template-management');
		}else{
			$this->load->view('templates/dashboard/head', $data);
			$data['sidebar'] = $this->load->view('templates/dashboard/sidebarAdmin', $data, true);
			$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('pages/admin/template', $data);
			$this->load->view('templates/dashboard/footer');
		}

    }

	public function getTemplate(){
		$listArtikel = $this->AdminModel->getTemplate();
		$data = array();
		foreach($listArtikel->result() as $item){
			$img = base_url('assets/images/detail_artikel/'.$item->sampul);
			$urlSelengkapnya = base_url('artikel/'.$item->slug);
			$row = array();
            $row = array(
                'judul' => $item->judul_artikel,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->kategori,
				'urlselengkapnya' => $urlSelengkapnya
            );
            $data[] = $row;
		}

		$output = array(
	        "data" => $data,
			"testing" => "Hello"
	    );

        echo json_encode($output);
	}

	public function checkThumbnail($str){
		$allowed_mime_type_arr = array('image/jpeg', 'image/png');
		$mime = get_mime_by_extension($_FILES['sampul_template']['name']);
		$maxsize = 5000000; // 5 mb

		if (isset($_FILES['sampul_template']['name']) && $_FILES['sampul_template']['name'] != "") {
			if (in_array($mime, $allowed_mime_type_arr)) {
				if ($_FILES['sampul_template']['size'] >= $maxsize) {
					$this->form_validation->set_message('checkThumbnail', 'Terlalu besar. Maximal 5 MB');
					return false;
				}else{
					return true;
				}
			}else{
				$this->form_validation->set_message('checkThumbnail', 'Harus berupa jpg atau png');
				return false;
			}
		}else{
			$this->form_validation->set_message('checkThumbnail', 'Tidak boleh kosong');
			return false;
		}
	}

}