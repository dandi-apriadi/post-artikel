<?php 

/*

User Model

Fungsi :
- Menambahkan User
- Mengedit Password User
- Mengambil Data User Berdasarkan ID
- Dan masih banyak lagi, yang berkaitan dengan data user

*/

class UserModel extends CI_Model{

    public $table = 'user';
   
    public function add($data = array()){
        $this->db->insert($this->table, $data);
    }

    public function update($data = array()){
        $this->db->where('email', $data['email']);
        $this->db->update($this->table, $data);
    }

    public function deleteData($id){
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function updateUser($dataUser = array()){
        $this->db->where('id', $dataUser['id']);
        $this->db->update($this->table, $dataUser);
    }

    public function verifyToken($data = array()){
        $this->db->where('token', $data['token']);
        $this->db->update($this->table, $data);
    }

    public function getById($id){
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    public function getBytoken($token){
        $this->db->where('token', $token);
        $this->db->where('verified_email', 'no');
        return $this->db->count_all_results($this->table);
    }

    public function checkEmail($email){
        $this->db->where('email', $email);
        $this->db->where('verified_email', 'no');
        return $this->db->count_all_results($this->table);
    }

    public function changePass($password, $userId){
        $this->db->where('id', $userId);
        $this->db->update($this->table, array('password' => $password));
    }

}