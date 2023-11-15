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
    public $table = 'struk';


    public function addcache($dataCache = array()){
        $this->db->insert('cache_transaksi', $dataCache);
    }

    public function getcache() {
        $this->db->where('userId',$_SESSION['id_user']);
        $query = $this->db->get('cache_transaksi');
        return $query;
    }
}