<?php 

/*

Barang Model

Fungsi :
- Menampilkan Data Barang
- Mengedit Data Barang
- Menghapus Data Barang
- Menampilkan Profil Barang

*/

class BarangModel extends CI_Model{
    public $table = 'barang';
    
    public function addbarang($data = array()){
        $this->db->insert($this->table, $data);
    }

    public function getBarang($id) {
        $this->db->where('userId',$id);
        $query = $this->db->get('barang');
        return $query->result();
    }

  
    public function getById($id){
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

}