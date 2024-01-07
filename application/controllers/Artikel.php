<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

    public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel','ArtikelModel','UserModel','HomepageModel']);

		// jika belum login, tdk bisa kesini
		if (!isset($_SESSION['logged_in'])) {
			redirect('/');
		}
	}

	public function index(){
		$data['title'] = "The Truth - Artikel";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->role != 'pengguna')
			redirect('/');

		if($data['getUser']->status == 'active'){
			$data['page'] = 'artikel';
			$data['sidebar'] = $this->load->view('templates/dashboard/sidebarPengguna', $data, true);
			$this->load->view('templates/dashboard/navbar', $data);
			$this->load->view('pages/dashboard/artikel', $data);
			$this->load->view('templates/dashboard/footer');
		}else{
            redirect('inactive');
		}
	}

    public function template($id){
		$data['title'] = "The Truth - Template";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->role != 'pengguna')
			redirect('/');

		if($data['getUser']->status == 'active'){
			$this->load->view('templates/dashboard/navbar', $data);
			$data['template'] = $this->ArtikelModel->getTemplateBySlug($id);
			$this->load->view('artikel/artikel/'.$data['template']->file_artikel, $data);
			$this->load->view('templates/dashboard/footer');
		}else{
            redirect('inactive');
		}
	}
	
	public function editing($id){
		$data['title'] = "The Truth - Edit Artikel";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);
		$artikel = $this->ArtikelModel->getArtikel($id);

		if($data['getUser']->role != 'pengguna')
			redirect('/');

		if($artikel->userid != $_SESSION['id_user']){
			redirect('/');
		}	

		if($data['getUser']->status == 'active'){
			$this->form_validation->set_rules('artikel-title', '', 'required', array(
                'required' => 'Tidak boleh kosong',
            ));
			$this->form_validation->set_rules('artikel-deskripsi-1', '', 'required', array(
                'required' => 'Tidak boleh kosong',
            ));

            if($this->form_validation->run()){
				$thumbnail = $artikel->sampul;
				$file = $_FILES["Image-1"];
				if(!empty($file['name'])) {
					deleteImage('assets/images/detail_artikel/',$artikel->sampul);
					$config['upload_path']   = 'assets/images/detail_artikel/';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size']      = 5000000; // 5mb
					$config['file_name']     = time() . '_' . rand();
					$this->load->library('upload', $config);
					$this->upload->do_upload('Image-1');
					$thumbnails = $this->upload->data();
					$thumbnail = $thumbnails['file_name'];
				}

				$slug1 = slug_seo(htmlspecialchars($this->input->post('artikel-title')));
				if($slug1 == $artikel->slug){
					$slug = $artikel->slug;
				}else{	
					$slug = $this->ArtikelModel->cekSlug($slug1);
				}
				$countDetail = intval(htmlspecialchars($this->input->post('element')));

				$this->ArtikelModel->update($data = array(
					'no_artikel' => $artikel->no_artikel,
					'slug' => $slug,
					'judul_artikel' => htmlspecialchars($this->input->post('artikel-title')),
					'kategori' => htmlspecialchars($this->input->post('artikel-kategori')),
					'sampul' => $thumbnail,
					'status' => htmlspecialchars($this->input->post('artikel-status')),
					'deskripsi' => htmlspecialchars($this->input->post('artikel-deskripsi-1'))
				));

				for ($i = 2; $i <= $countDetail; $i++) {
					$detail = $this->ArtikelModel->getDetail($artikel->no_artikel,$i);
					$img = $detail->image;
					$file = $_FILES["Image-".$i];
					
					if(!empty($file['name'])) {
						deleteImage('assets/images/detail_artikel/',$detail->image);
						$config['upload_path']   = 'assets/images/detail_artikel/';
						$config['allowed_types'] = 'jpg|png|jpeg';
						$config['max_size']      = 5000000; // 5mb
						$config['file_name']     = time() . '_' . rand();
						$this->load->library('upload', $config);
						$this->upload->do_upload('Image-'.$i);
						$thumbnails = $this->upload->data();
						$img = $thumbnails['file_name'];
					}

					$this->ArtikelModel->updateDetail($detail = array(
						'no_artikel' => $artikel->no_artikel,
						'urutan' => $i,
						'image' => $img,
						'title_image' => htmlspecialchars($this->input->post('image-title-'.$i)),
						'text' => htmlspecialchars($this->input->post('artikel-deskripsi-'.$i))
					));
				}

				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Artikel diSimpan",
                    icon: "success",})</script>'
                );
                redirect('artikel-edit/'.$slug);
			}else{
				$this->load->view('templates/dashboard/navbar', $data);
				$data['artikel'] = $this->ArtikelModel->getArtikel($id);
				$data['index'] = 1;
				$data['detail'] = $this->HomepageModel->getDetail($data['artikel']->no_artikel); 
				$template = $this->ArtikelModel->getTemplateById($data['artikel']->no_template);
				$this->load->view('artikel/editing/'.$template->file_editing, $data);
				$this->load->view('templates/dashboard/footer');
			}
		}else{
            redirect('inactive');
		}
	}

    public function create($id){
		$data['title'] = "The Truth - Create";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$this->load->view('templates/dashboard/head', $data);

		if($data['getUser']->role != 'pengguna')
		redirect('/');

		if($data['getUser']->status == 'active'){
            
            $this->form_validation->set_rules('artikel-title', '', 'required', array(
                'required' => 'Tidak boleh kosong',
            ));
			$this->form_validation->set_rules('artikel-deskripsi-1', '', 'required', array(
                'required' => 'Tidak boleh kosong',
            ));
			$this->form_validation->set_rules('Image-1', '', 'callback_checkThumbnail');

            if($this->form_validation->run()){
				$config['upload_path']   = 'assets/images/detail_artikel/';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']      = 5000000; // 5mb
				$config['file_name']     = time() . '_' . rand();
				$this->load->library('upload', $config);
				$this->upload->do_upload('Image-1');
				$thumbnail = $this->upload->data();

				$slug1 = slug_seo(htmlspecialchars($this->input->post('artikel-title')));
				$slug = $this->ArtikelModel->cekSlug($slug1);

				$noArtikel = rand(1,999900).'-'.time();
				$countDetail = intval(htmlspecialchars($this->input->post('element')));
				$template = $this->ArtikelModel->getTemplateBySlug($id);
				$this->ArtikelModel->add($data = array(
					'no_artikel' => $noArtikel,
					'no_template' => $template->no_template,
					'slug' => $slug,
					'judul_artikel' => htmlspecialchars($this->input->post('artikel-title')),
					'userid' => $_SESSION['id_user'],
					'kategori' => htmlspecialchars($this->input->post('artikel-kategori')),
					'sampul' => $thumbnail['file_name'],
					'status' => htmlspecialchars($this->input->post('artikel-status')),
					'deskripsi' => htmlspecialchars($this->input->post('artikel-deskripsi-1'))
				));

				for ($i = 2; $i <= $countDetail; $i++) {
					$config2['upload_path']   = 'assets/images/detail_artikel/';
					$config2['allowed_types'] = 'jpg|png|jpeg';
					$config2['max_size']      = 5000000; // 5mb
					$config2['file_name']     = time() . '_' . rand();
					$this->load->library('upload', $config2);
					$upload = "Image-".$i;
					$this->upload->do_upload($upload);
					$thumbnail = $this->upload->data();

					$this->ArtikelModel->addDetail($detail = array(
						'no_artikel' => $noArtikel,
						'urutan' => $i,
						'image' => $thumbnail['file_name'],
						'title_image' => htmlspecialchars($this->input->post('image-title-'.$i)),
						'text' => htmlspecialchars($this->input->post('artikel-deskripsi-'.$i))
					));
				}

                $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                    title: "Berhasil",
                    text: "Artikel Telah dibuat",
                    icon: "success",})</script>'
                );
                redirect('artikel');
            }else{
				$data['template'] = $this->ArtikelModel->getTemplateBySlug($id);
                $this->load->view('templates/dashboard/navbar', $data);
				$this->load->view('artikel/create/'.$data['template']->file_create, $data);
                $this->load->view('templates/dashboard/footer');
            }
		}else{
            redirect('inactive');
		}
	}

	public function checkThumbnail($str){
		$allowed_mime_type_arr = array('image/jpeg', 'image/png');
		$mime = get_mime_by_extension($_FILES['Image-1']['name']);
		$maxsize = 5000000; // 5 mb

		if (isset($_FILES['Image-1']['name']) && $_FILES['Image-1']['name'] != "") {
			if (in_array($mime, $allowed_mime_type_arr)) {
				if ($_FILES['Image-1']['size'] >= $maxsize) {
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

	public function getArtikel(){
		$listArtikel = $this->ArtikelModel->getArtikelPengguna();
		$data = array();
		foreach($listArtikel->result() as $item){
			$like = $this->HomepageModel->getLikes($item->no_artikel);
			$view = $this->HomepageModel->getView($item->no_artikel);
			$comment = $this->HomepageModel->getComment($item->no_artikel);
			$img = base_url('assets/images/detail_artikel/'.$item->sampul);
			$urlSelengkapnya = base_url('artikel/'.$item->slug);
			$urlEditing = base_url('artikel-edit/'.$item->slug);
			$row = array();
            $row = array(
                'judul' => $item->judul_artikel,
				'img' => $img,
				'tanggal' => tanggal($item->tanggal),
				'kategori' => $item->kategori,
				'urlselengkapnya' => $urlSelengkapnya,
				'urlediting' => $urlEditing,
				'like' => $like,
				'view' => $view,
				'comment' => $comment
            );
            $data[] = $row;
		}

		$output = array(
	        "data" => $data
	    );

        echo json_encode($output);
	}

	public function getTemplate(){
		$listTemplate = $this->ArtikelModel->getTemplate();
		$data = array();
		foreach($listTemplate->result() as $item){
			$img = base_url('assets/images/templateartikel/'.$item->sampul_template);
			$url = base_url('artikel-template/'.$item->slug);
			$row = array();
            $row = array(
                'nama' => $item->nama_template,
				'img' => $img,
				'deskripsi' => $item->deskripsi,
				'url' => $url
            );
            $data[] = $row;
		}

		$output = array(
	        "data" => $data,
			"testing" => "Hello"
	    );

        echo json_encode($output);
	}

	public function likes(){
		$noArtikel = htmlspecialchars($this->input->post('artikel'));
		$like = $this->ArtikelModel->likes($noArtikel);
		$liked = $this->HomepageModel->changeLiked($noArtikel);
		
		$output = array(
	        "like" => $like,
			"liked" => $liked
	    );
        echo json_encode($output);
	}

	public function sendComment(){
		$noArtikel = htmlspecialchars($this->input->post('artikel'));
		$comment = htmlspecialchars($this->input->post('comment'));
		$id = rand()."-". time();

		$this->ArtikelModel->addComment($data = array(
			'id_comment' => $id,
			'userid' => $_SESSION['id_user'],
			'isi' => $comment,
			'no_artikel' => $noArtikel
		));

        echo json_encode("Hello");

	}

	public function showComment($id){
		$list = $this->ArtikelModel->getComment($id);
		$data = array();
        foreach($list->result() as $comment){
			$dataUser = $this->UserModel->getById($comment->userid);
			$detailUser = $this->UserModel->getDetailUser($comment->userid);
			$urlUsername = base_url('username/'.$detailUser->username);
			$profile = base_url('assets/images/profile/'.$detailUser->profile);

			if (isSessionDeclared('id_user')) {
				$liked = $this->HomepageModel->changeLikedComment($comment->id_comment);
			} else {
				$liked = "fa-regular fa-heart scale-125";
			}
			
			$like = $this->HomepageModel->getLikesComment($comment->id_comment);

			$row = array();
            $row = array(
                'id_comment' => $comment->id_comment,
                'nama_pengguna' => $dataUser->firstname.' '.$dataUser->lastname,
                'username' => $dataUser->username,
				'tanggal' => tanggal($comment->tanggal),
				'isi' => $comment->isi,
				'url_username' => $urlUsername,
				'profile' => $profile,
				'comment_likes' => $like,
				'liked' => $liked
            ); 

            $data[] = $row;
		}

		$output = array(
			'data' => $data
		);

        echo json_encode($output);
	}

	public function commentCheck(){
		$idComment = htmlspecialchars($this->input->post('comment'));
		
		$like = $this->ArtikelModel->likesComment($idComment);
		$liked = $this->HomepageModel->changeLikedComment($idComment);
		
		$output = array(
	        "like" => $like,
			"liked" => $liked
	    );

        echo json_encode($output);
	}

}
