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
        $data['getStruk'] = $this->KasirModel->getTransactions();
		$dataKaryawan = $this->KaryawanModel->getById($_SESSION['id_user']);
        $data['barang'] = $this->KasirModel->getBarang($dataKaryawan->ownerId);
        $data['cache'] = $this->KasirModel->getcache();
		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'karyawan')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarKaryawan', $data, true);
		$this->load->view('pages/transaksi/tambahtransaksi', $data);

		$this->load->view('templates/dashboard/footer');

        if(isset($_POST['finish'])){
            $validasi = $this->KasirModel->validasiJumlahBarang();

            if($validasi == true){
               $jumlahBayar = $this->input->post('jumlahBayar');
               if (!empty($jumlahBayar)) {
                    $noTransaksi = $this->input->post('notransaksi');
                    $this->KasirModel->kurangiJumlahBarang();
                    $this->KasirModel->transferCacheToDetail();
                    $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                        title: "Berhasil",
                        text: "Pesanan Berhasil diBuat",
                        icon: "success",})</script>'
                    );
                    redirect('/kasir/detail-transaksi/'.$noTransaksi);
                }else{
                    $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
                        title: "Gagal",
                        text: "Mohon Masukkan Jumlah Pembayaran",
                        icon: "error",})</script>'
                    );
                redirect('/kasir/add');
                }
            }elseif($validasi == false){
                $this->session->set_flashdata('msg_sweetalert', '<script>Swal.fire({
				title: "Gagal Melakukan Transaksi",
				text: "Salah Satu Stok Produk Anda Tidak Cukup",
				icon: "error",})</script>'
                );
                redirect('/kasir/add');
            }
            
        }
    }

    public function saveTransaction(){
        $dataTransaksi = array(
            'no_transaksi' => rand()."-".time(),
            'userId' => $_SESSION['id_user'],
            'metode_pembayaran' => $_POST['jenisPembayaran'],
            'uang_pelanggan' => $_POST['uangPelanggan'],
            'status' => 'draft'
        );
        $this->KasirModel->saveTransaction($dataTransaksi);
    }

    public function getDataTransaction(){
        $dataTransaksi = $this->KasirModel->getTransactions();
        $uangPelanggan = number_format($dataTransaksi->uang_pelanggan, 0, '.', ',');
        $uangKembalian = number_format($dataTransaksi->uang_kembalian, 0, '.', ',');

        $output = array(
                    "uangPelanggan" => $uangPelanggan,
                    "uangKembalian" => $uangKembalian,
                    "jenisPembayaran" => $dataTransaksi->metode_pembayaran,
                    "waktuTransaksi" => $dataTransaksi->tanggal_pesanan,
                    "noTransaksi" => $dataTransaksi->no_transaksi
                );
        echo json_encode($output);
    }

	public function execute_action() {
		$dataCache = array(
			'userId' => $_SESSION['id_user'],
			'nama_barang' => $this->input->post('namaBarang'),
			'jumlah_barang' => $this->input->post('jumlah'),
			'harga_satuan' => $this->input->post('harga'),
			'barangId' => $this->input->post('barangId')
		);

		$dataTransaksi = array(
			'userId' => $_SESSION['id_user'],
			'status' => 'draft'
		);
		
        $this->KasirModel->addcache($dataCache,$dataTransaksi);

		$link = base_url('assets/images/logo/sutanstore.png');
		$this->KaryawanModel->getById($_SESSION['id_user']);
	}

    public function cache_transaksi(){
        
		$list = $this->KasirModel->getcache();
		$data = array();
        $totalBiaya = 0;
        foreach($list->result() as $detail){
			$row = array();
            $harga = number_format($detail->harga_satuan, 0, '.', ',');
            $subTotal = number_format($detail->harga_satuan * $detail->jumlah_barang, 0, '.', ',');
            $totalharga = $detail->harga_satuan * $detail->jumlah_barang;
            $totalBiaya = $totalBiaya + $totalharga;

            $row = array(
                'id' => $detail->id,
                'userId' => $detail->userId,
                'nama_barang' => $detail->nama_barang,
                'jumlah_barang' => $detail->jumlah_barang,
                'harga' => $harga,
                'sub_total' => $subTotal
            );

            $data[] = $row;
		}
        $dataTransaksi = array(
            'userId' => $_SESSION['id_user'],
            'total_biaya' => $totalBiaya,
            'status' => 'draft'         
        );
        $update = $this->KasirModel->updateTransaksi($dataTransaksi);
        $totalBiaya = number_format($update, 0, '.', ',');
        $output = array(
	        "data" => $data,
            "totalBiaya" => $totalBiaya
	    );
	    //output to json format
        echo json_encode($output);
    }

    public function deleteCache($id){
        $this->KasirModel->deleteCache($id);
        $list = $this->KasirModel->getcache();
        $totalBiaya = 0;
        foreach($list->result() as $detail){
            $totalharga = $detail->harga_satuan * $detail->jumlah_barang;
            $totalBiaya = $totalBiaya + $totalharga;
		}
        $data = array(
          'total_biaya' => $totalBiaya,
          'userId' => $_SESSION['id_user'],
          'status' => 'draft'
        );
        $this->KasirModel->updateTransaksi($data);
        redirect('/kasir/add');
    }

    public function detailTransaksi($id){
        $data['title'] = "Detail Transaksi";
		$data['getUser'] = $this->AuthModel->getDataLoggedIn($_SESSION['id_user']);
		$data['getKaryawan'] = $this->KaryawanModel->getById($_SESSION['id_user']);
        $data['detail'] = $this->KasirModel->getDetailTransaction($id);
        $data['transaksi'] = $this->KasirModel->getTransaction($id);

		$dataKaryawan = $this->KaryawanModel->getById($_SESSION['id_user']);
		// jika bukan admin yg login, maka tdk bisa kesini
		if ($data['getUser']->role != 'karyawan')
			redirect('dashboard');

		$this->load->view('templates/dashboard/head', $data);
		$this->load->view('templates/dashboard/navbar', $data);

		$data['sidebar'] = $this->load->view('templates/dashboard/sidebarKaryawan', $data, true);
		$this->load->view('pages/transaksi/detailtransaksi', $data);

		$this->load->view('templates/dashboard/footer');
    }

    public function searchItem($id){
        $key = $id;
        $dataKaryawan = $this->KaryawanModel->getById($_SESSION['id_user']);
        $list = $this->KasirModel->searchBarang($key,$dataKaryawan->ownerId);

		$data = array();
        $totalBiaya = 0;
        foreach($list->result() as $detail){
            if($detail->userId != $dataKaryawan->ownerId){
                continue;
            }
            $harga = number_format($detail->harga, 0, '.', ',');
            $gambar = base_url('assets/images/barang/'.$detail->gambar);
			$row = array();
            $row = array(
                'nama_barang' => $detail->nama_barang,
                'gambar' => $gambar,
                'stok' => $detail->stok,
                'harga' => $harga,
                'hargasistem' => $detail->harga,
                'id' => $detail->id,
                'deskripsi' => $detail->deskripsi
            );

            $data[] = $row;
		}
        
        $output = array(
	        "data" => $data
	    );
        echo json_encode($output);
    }


}