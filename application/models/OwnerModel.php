<?php 

/*

Owner Model

Fungsi :
- Menampilkan Data Owner
- Mengedit Data Owner
- Menghapus Data Owner
- Menampilkan Profil Owner

*/

class OwnerModel extends CI_Model{

    public $table = 'owner';

    public $column_order = array(null, 'user.firstname', 'user.lastname', 'user.email', 'owner.nama_toko', 'owner.slogan_toko');
    public $column_search = array('user.firstname', 'user.lastname', 'user.email', 'owner.nama_toko');
    public $order = array('user.id' => 'desc');

   public function _get_datatables_query(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('user', 'owner.userId = user.id');
        $this->db->where('user.role', 'owner');

        $i = 0;

        foreach($this->column_search as $item){ // loop column
            if ($_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); // close bracket
            }

            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();

        return $query->result();
    }

    public function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();

        return $query->num_rows();
    }

    public function count_all(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('user', 'owner.userId = user.id');
        $this->db->where('user.role', 'owner');

        return $this->db->count_all_results();
    }

    public function add($data = array()){
        $this->db->insert($this->table, $data);
    }

    public function update($id, $data = array()){
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function getById($id){
        return $this->db->get_where($this->table, array('userId' => $id))->row();
    }

    public function getByUserId($id){
        return $this->db->get_where($this->table, array('userId' => $id))->row();
    }

    public function updateProfil($userId, $data = array()){
        $this->db->where('userId', $userId);
        $this->db->update($this->table, $data);
    }

    public function totalData($table){
        if($table == 'barang'){
            $this->db->where('userId', $_SESSION['id_user']);
            return $this->db->count_all_results($table);
        }elseif($table == 'karyawan'){
            $this->db->where('ownerId', $_SESSION['id_user']);
            return $this->db->count_all_results($table);
        }elseif($table == 'transaksi'){ 
            $this->db->where('ownerId', $_SESSION['id_user']);
            $query = $this->db->get('karyawan')->result();
            $index = 0;
            foreach ($query as $karyawan) {
                $this->db->where('userId', $karyawan->userId);
                $this->db->where('status', 'submitted');
                $queryTransaksi = $this->db->get('transaksi')->result();
                foreach ($queryTransaksi as $item) {
                    $index++;
                }
            }
            return $index;
        }elseif($table == 'nota'){
            $this->db->where('ownerId', $_SESSION['id_user']);
            $query = $this->db->get('karyawan')->result();
            $index = 0;
            foreach ($query as $karyawan) {
                $this->db->where('teknisiId', $karyawan->userId);
                $queryTransaksi = $this->db->get('nota_service')->result();
                foreach ($queryTransaksi as $item) {
                    $index++;
                }
            }
            return $index;
        }
    }

    public function getDataTransaction(){
        $this->db->where('ownerId', $_SESSION['id_user']);
        $query = $this->db->get('karyawan')->result();
            foreach ($query as $karyawan) {
                $this->db->where('userId', $karyawan->userId);
                $this->db->where('status', 'submitted');
                $queryTransaksi = $this->db->get('transaksi')->result();
                foreach ($queryTransaksi as $item) {
                    $this->db->select('tanggal_pesanan');
                    $this->db->distinct();
                    $this->db->from('transaksi');
                    $this->db->order_by('tanggal_pesanan', 'DESC'); 
                    $this->db->limit(7);
                    $query = $this->db->get();
                    return $query;
                }
            }
    }

    public function CountTransactionByDate($date){
        $this->db->from('transaksi');
        $this->db->where('tanggal_pesanan', $date);
        return $this->db->count_all_results();
    }

    public function getDate($type){

        if($type == 'min'){
            $this->db->where('userId',$_SESSION['id_user']);
            $this->db->select_min('tanggal_pesanan', 'earliest_date');
            $query = $this->db->get('transaksi');
    
            // Periksa apakah query berhasil
            if ($query->num_rows() > 0) {
                return $query->row()->earliest_date;
            } else {
                return null;
            }
        }elseif($type == 'max'){
            $this->db->where('userId',$_SESSION['id_user']);
            $this->db->select_max('tanggal_pesanan', 'latest_date');
            $query = $this->db->get('transaksi');

            // Periksa apakah query berhasil dieksekusi
            if ($query->num_rows() > 0) {
                return $query->row()->latest_date;
            } else {
                return null;
            }
        }
    }

    public function showTransaction(){
        $this->db->where('userId', $_SESSION['id_user']);
        $result = $this->db->get('transaksi');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return array();
        }
    }
}