<?php 

/*

karyawan Model

Fungsi :
- Menampilkan Data karyawan
- Mengedit Data karyawan
- Menghapus Data karyawan
- Menampilkan Profil karyawan

*/

class KasirModel extends CI_Model{
    public $table = 'transaksi';

    public function getTransactions(){
        $result = $this->db->get_where('transaksi', array('userId' => $_SESSION['id_user'], 'status' => 'draft'))->row();
        
        // Mengecek apakah data ditemukan atau tidak
        if ($result) {
            return $result;
        } else {
            return 0;
        }
    }
    

    public function transferCacheToDetail() {
        // Ambil data dari cache_transaksi berdasarkan userId
        $this->db->where('userId', $_SESSION['id_user']);
        $this->db->where('status', 'draft');

        $dataTransaksi = $this->db->get('transaksi')->row();


        $this->db->where('userId', $_SESSION['id_user']);
        $cacheData = $this->db->get('cache_transaksi')->result();

        if (!empty($cacheData)) {
            // Pindahkan data dari cache_transaksi ke detail_transaksi
            foreach ($cacheData as $cacheRow) {
                $detailData = array(
                    'no_transaksi' => $dataTransaksi->no_transaksi,
                    'barangId'        => $cacheRow->barangId,
                    'nama_barang'        => $cacheRow->nama_barang,
                    'harga_satuan'        => $cacheRow->harga_satuan,
                    'jumlah'        => $cacheRow->jumlah_barang
                );
                // Insert data ke detail_transaksi
                $this->db->insert('detail_transaksi', $detailData);

                $this->db->where('userId', $_SESSION['id_user']);

            }

            // Hapus data dari cache_transaksi setelah dipindahkan
            $this->db->where('userId', $_SESSION['id_user']);
            $this->db->delete('cache_transaksi');

            $this->db->where('no_transaksi',$dataTransaksi->no_transaksi);
            $this->db->update('transaksi', array('status' => 'submitted'));
            
        }
    }

    public function saveTransaction($dataTransaksi){
        $this->db->where('status', $dataTransaksi['status']);
        $existingTransaksi = $this->db->get_where('transaksi', array('userId' => $dataTransaksi['userId']))->row();
    
        // Hitung nilai uang kembalian
        $totalBiaya = $existingTransaksi ? $existingTransaksi->total_biaya : 0;
        $uangPelanggan = $dataTransaksi['uang_pelanggan'];
        $uangKembalian = $uangPelanggan - $totalBiaya;
    
        // Tambahkan nilai uang kembalian ke dalam array dataTransaksi
        $dataTransaksi['uang_kembalian'] = $uangKembalian;
    
        if ($existingTransaksi) {
            // Jika transaksi sudah ada, lakukan proses update
            $this->db->where('status', $dataTransaksi['status']);
            $this->db->update('transaksi', $dataTransaksi);
        } else {
            // Jika belum ada, lakukan proses insert
            $this->db->insert('transaksi', $dataTransaksi);
        }
    }
    

    public function addcache($dataCache = array(), $dataTransaksi = array()) {
        // Cek apakah user ID sudah ada di tabel transaksi
        $existingTransaksi = $this->db->get_where('transaksi', array('userId' => $dataTransaksi['userId'], 'status' => 'draft'))->row();
    
        if ($existingTransaksi) {
          
        } else {
            // Jika belum ada, lakukan proses insert
            $this->db->insert('transaksi', $dataTransaksi);
        }
    
        // Cek apakah barang ID sudah ada di tabel cache_transaksi
        $existingCache = $this->db->get_where('cache_transaksi', array('barangId' => $dataCache['barangId']))->row();
    
        if ($existingCache) {
            // Jika sudah ada, tambahkan jumlah_barang dari nilai sebelumnya
            $dataCache['jumlah_barang'] += $existingCache->jumlah_barang;
            $this->db->where('barangId', $dataCache['barangId']);
            $this->db->update('cache_transaksi', $dataCache);
        } else {
            // Jika belum ada, lakukan proses insert
            $this->db->insert('cache_transaksi', $dataCache);
        }
    }
    

    public function getcache() {
        $this->db->where('userId',$_SESSION['id_user']);
        $query = $this->db->get('cache_transaksi');
        return $query;
    }

    public function getDetailTransaction($id) {
        $this->db->where('no_transaksi',$id);
        $query = $this->db->get('detail_transaksi');
        return $query;
    }

    public function getTransaction($id) {
        $this->db->where('no_transaksi',$id);
        $query = $this->db->get('transaksi');
        return $query->row();
    }

    public function updateTransaksi($dataTransaksi) {
        // Contoh: Update transaksi berdasarkan ID transaksi
        $this->db->where('userId', $dataTransaksi['userId']);
        $this->db->where('status', $dataTransaksi['status']);
        $this->db->update('transaksi', $dataTransaksi);
        
        // Ambil nilai total_biaya setelah update
        $this->db->select('total_biaya');
        $this->db->where('userId', $dataTransaksi['userId']);
        $this->db->where('status', $dataTransaksi['status']);
        $result = $this->db->get('transaksi');

        if ($result->num_rows() > 0) {
            // Ambil nilai total_biaya dari hasil query
            $row = $result->row();
            return $row->total_biaya;
        } else {
            // Return nilai default jika tidak ada hasil
            return 0;
        }
    }

    public function validasiJumlahBarang() {
        // Ambil data jumlah barang dari cache_transaksi
        $cacheBarang = $this->db->select('barangId, jumlah_barang')->get('cache_transaksi')->result_array();

        // Inisialisasi array untuk menyimpan jumlah barang dari tabel barang
        $barangJumlah = array();

        // Ambil data jumlah barang dari tabel barang
        $barang = $this->db->select('id, stok')->get('barang')->result_array();

        // Ubah format data barang untuk kemudahan pencarian
        foreach ($barang as $row) {
            $barangJumlah[$row['id']] = $row['stok'];
        }

        // Periksa apakah jumlah barang dari cache_transaksi lebih besar atau sama dengan jumlah barang dari tabel barang
        foreach ($cacheBarang as $row) {
            $barangId = $row['barangId'];
            $jumlahCache = $row['jumlah_barang'];

            if (!isset($barangJumlah[$barangId]) || $jumlahCache > $barangJumlah[$barangId]) {
                // Jika jumlah barang dari cache_transaksi lebih besar dari tabel barang, kembalikan false
                return false;
            }
        }

        // Jika semua jumlah barang dari cache_transaksi lebih kecil atau sama dengan tabel barang, kembalikan true
        return true;
    }

    public function kurangiJumlahBarang() {
        // Ambil data jumlah barang dari cache_transaksi
        $this->db->where('userId', $_SESSION['id_user']);
        $cacheBarang = $this->db->select('barangId, jumlah_barang')->get('cache_transaksi')->result_array();

        foreach ($cacheBarang as $row) {
            $barangId = $row['barangId'];
            $jumlahCache = $row['jumlah_barang'];

            // Kurangi jumlah barang di tabel 'barang' berdasarkan jumlah di cache_transaksi
            $this->db->set('stok', 'stok - ' . $jumlahCache, false);
            $this->db->where('id', $barangId);
            $this->db->update('barang');
        }
    }
    
    public function deleteCache($id) {
        $this->db->where('id', $id);
        $this->db->delete('cache_transaksi');
    }

}