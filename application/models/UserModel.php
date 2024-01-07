<?php 

class UserModel extends CI_Model{

    public $table = 'users';
   
    public function add($data = array(),$detail = array()){
        $this->db->insert($this->table, $data);
        $this->db->insert('users_detail', $detail);
    }

    public function getBytoken($token){
        $this->db->where('token', $token);
        return $this->db->count_all_results($this->table);
    }

    public function getById($id){
        $this->db->where('userid', $id);
        $query = $this->db->get('users')->row();
        return $query;
    }

    public function getDetailUser($id){
        $this->db->where('userid', $id);
        $query = $this->db->get('users_detail')->row();
        return $query;
    }

    public function verifyToken($data = array()){
        $this->db->where('token', $data['token']);
        $this->db->update($this->table, $data);
    }

}