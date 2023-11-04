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

}

