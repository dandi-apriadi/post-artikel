<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model(['AuthModel', 'OwnerModel','NotaModel','KasirModel']);

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

	public function listTransaksi(){
		$data['title'] = "Data Transaksi";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['list'] = $this->OwnerModel->showTransaction('transaksi');
		$data['date1'] = $this->OwnerModel->getDate('min','transaksi');
		$data['date2'] = $this->OwnerModel->getDate('max','transaksi');
		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/owner/listTransaksi', $data);
		$this->load->view('templates/dashboard/footer');
	}

	public function searchTransaksi(){
        $key = $this->input->post('key');
		$start = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('start'))));
		$end = date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('end'))));


        $list = $this->OwnerModel->searchTransaksi(array('key' => $key,'start' => $start,'end' => $end));
		$data = array();
        $no = 0;
        foreach($list->result() as $detail){
			$no++;
			$rowColorClass = ($no % 2 == 0) ? 'background-color: #FFFFFF;' : 'background-color: #F2F2F2;';
			$url = base_url('owner/detail-transaksi/'.$detail->no_transaksi);
            $total_bayar = number_format($detail->total_biaya, 0, '.', ',');
            $diskon = number_format($detail->diskon, 0, '.', ',');
			$row = array();
            $row = array(
				'no' => $no,
				'color' => $rowColorClass,
				'url' => $url,
                'no_transaksi' => $detail->no_transaksi,
                'cashier' => $detail->cashier,
                'tanggal_pesanan' => $detail->tanggal_pesanan,
                'total_biaya' => $total_bayar,
                'diskon' => $diskon,
                'metode_pembayaran' => $detail->metode_pembayaran,
				'status' => $detail->status
            );

            $data[] = $row;
		}
        
        $output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}


	public function listNota(){
		$data['title'] = "Data Nota Teknisi";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['list'] = $this->OwnerModel->showTransaction('nota_teknisi');
		$data['date1'] = $this->OwnerModel->getDate('min','nota_teknisi');
		$data['date2'] = $this->OwnerModel->getDate('max','nota_teknisi');
		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/owner/listNota', $data);
		$this->load->view('templates/dashboard/footer');
	}

	public function searchNota(){
        $key = $this->input->post('key');
		$start = $this->input->post('start');
		$end = $this->input->post('end');

        $list = $this->OwnerModel->searchNota(array('key' => $key,'start' => $start,'end' => $end));
		$data = array();
        $no = 0;
        foreach($list->result() as $detail){
			$no++;
			$rowColorClass = ($no % 2 == 0) ? 'background-color: #FFFFFF;' : 'background-color: #F2F2F2;';
			$url = base_url('nota/detail/'.$detail->no_invoice);
			$row = array();
            $row = array(
				'no' => $no,
				'color' => $rowColorClass,
				'url' => $url,
                'no_invoice' => $detail->no_invoice,
                'nama_customer' => $detail->nama_customer,
                'tanggal_masuk' => $detail->tanggal_masuk,
                'status_nota' => $detail->status_nota,
                'status_pembayaran' => $detail->status_pembayaran,
            );

            $data[] = $row;
		}
        
        $output = array(
	        "data" => $data
	    );
        echo json_encode($output);
	}

	public function detailNota($id){
		$data['title'] = "Data Nota";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$data['getOwner'] = $this->OwnerModel->getById($_SESSION['id_user']);
		$data['getNota'] = $this->NotaModel->getById($id);
		$data['invoice'] = $id;
		$data['lastHistory'] = $this->NotaModel->getLastHistory($id);

        if($data['getNota']->ownerId != $_SESSION['id_user'])
            redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/nota/detail_owner', $data);
		$this->load->view('templates/dashboard/footer');
	}

	public function notaActivity($id){
		$data['title'] = "Data Nota";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$data['getOwner'] = $this->OwnerModel->getById($_SESSION['id_user']);
		$data['getNota'] = $this->NotaModel->getById($id);
		$data['invoice'] = $id;
		$data['getHistory'] = $this->NotaModel->getHistory($id);
		$data['lastHistory'] = $this->NotaModel->getLastHistory($id);

		if($data['getNota']->ownerId != $_SESSION['id_user'])
            redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);
		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/nota/activity', $data);
		$this->load->view('templates/dashboard/footer');
	}

	public function detailTransaksi($id){
		$data['title'] = "Detail Transaksi";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
        $data['detail'] = $this->KasirModel->getDetailTransaction($id);
        $data['transaksi'] = $this->KasirModel->getTransaction($id);
        $data['getOwner'] = $this->OwnerModel->getById($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['transaksi']->ownerId != $_SESSION['id_user'])
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
		$this->load->view('pages/transaksi/detail', $data);

		$this->load->view('templates/dashboard/footer');
	}

	public function addNota(){
		$data['title'] = "Tambah Nota";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);

		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'owner')
			redirect('dashboard');

			$this->form_validation->set_rules('namaCustomer', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('noHp', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('alamat', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('namaBarang', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('imei', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('kerusakan', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('hargaService', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('uangPanjar', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('perbaikan', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			$this->form_validation->set_rules('keterangan', '', 'required', array(
				'required' => 'Tidak boleh kosong',
			));
			
			if($this->form_validation->run()){
				$namaCustomer = htmlspecialchars($this->input->post('namaCustomer'));
				$noHp = htmlspecialchars($this->input->post('noHp'));
				$alamat = htmlspecialchars($this->input->post('alamat'));
				$namaBarang = htmlspecialchars($this->input->post('namaBarang'));
				$imei = htmlspecialchars($this->input->post('imei'));
				$kerusakan = nl2br($this->input->post('kerusakan'));
				$hargaService = htmlspecialchars($this->input->post('hargaService'));
				$uangPanjar = htmlspecialchars($this->input->post('uangPanjar'));
				$perbaikan = htmlspecialchars($this->input->post('perbaikan'));
				$keterangan = nl2br($this->input->post('keterangan'));
				$statusPembayaran = htmlspecialchars($this->input->post('statusPembayaran'));
				$statusNota = 'Nota Teknisi dibuat Oleh ' . $data['getUser']->firstname.' '.$data['getUser']->lastname;
				$invoice = rand().'-'. time();
	
				$this->NotaModel->add(array(
					'no_invoice' => $invoice,
					'userId' => $_SESSION['id_user'],
					'nama_customer' => $namaCustomer,
					'no_hp' => $noHp,
					'alamat' => $alamat,
					'nama_barang' => $namaBarang,
					'serial_number' => $imei,
					'kerusakan' => $kerusakan,
					'perbaikan' => $perbaikan,
					'harga_service' => $hargaService,
					'uang_muka' => $uangPanjar,
					'status_nota' => 'Menunggu Teknisi',
					'status_pembayaran' => $statusPembayaran,
					'ownerId' => $_SESSION['id_user']
				));
				$this->NotaModel->addHistory(array(
					'no_invoice' => $invoice,
					'status' => $statusNota,
					'keterangan' => $keterangan
				));
				$this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
					title: "Berhasil",
					text: "Nota telah dibuat",
					icon: "success",})</script>'
				);
	
				redirect('owner/list-nota');
			}else{
				$this->load->view('templates/dashboard/head', $data);
				$this->load->view('templates/dashboard/navbar', $data);
		
				$data['sidebar'] = $this->load->view('templates/dashboard/sidebarOwner', $data, true);
				$this->load->view('pages/nota/add', $data);
		
				$this->load->view('templates/dashboard/footer');
			}

	}
	

}