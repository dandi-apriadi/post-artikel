<?php 

/*

Authentikasi Model

Fungsi :
- Auhtentikasi Login
- Mengambil Data User Yang Sedang Login

 */
class AuthModel extends CI_Model{

	public $table = 'user';
	public function login($email){
		$this->db->select(array('id', 'email', 'password', 'role'));

		return $this->db->get_where('user', array('email' => $email))->row();
	}

	// mengambil data yang sedang login
	public function getDataLoggedIn($userId){
		$this->db->select('*');
		$this->db->where('id', $userId);
		$this->db->from('user');

		return $this->db->get()->row();
	}

	public function checkEmailVerified($email){
		$this->db->where('email', $email);
		$this->db->where('verified_email', 'yes');
        return $this->db->count_all_results($this->table);
	}
}

?>