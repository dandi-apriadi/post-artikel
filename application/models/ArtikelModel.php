<?php 

class ArtikelModel extends CI_Model{

    public $table = 'artikel';

    public function add($data = array()){
        $this->db->insert($this->table, $data);
    }

    public function addComment($data = array()){
        $this->db->insert('comment_artikel', $data);
    }

    public function update($data = array()){
        $this->db->where('no_artikel', $data['no_artikel']);
        $this->db->update('artikel', $data);
    }

    public function updateDetail($data = array()){
        $this->db->where('no_artikel', $data['no_artikel']);
        $this->db->where('urutan', $data['urutan']);
        $this->db->update('detail_artikel', $data);
    }

    public function addDetail($data = array()){
        $this->db->insert('detail_artikel', $data);
    }

    public function getArtikelPengguna() {
        $this->db->where('userid',$_SESSION['id_user']);
        $query = $this->db->get('artikel');
        return $query;
    }

    public function getTemplate() {
        $query = $this->db->get('template');
        $this->db->where('status','active');
        return $query;
    }

    public function likes($id){
         // Mengecek apakah data sudah terdaftar
         $this->db->where('userid', $_SESSION['id_user']);
         $this->db->where('no_artikel', $id);
         $query = $this->db->get('like_artikel');
 
         if ($query->num_rows() > 0) {
             $this->db->where('userid', $_SESSION['id_user']);
             $this->db->where('no_artikel', $id);
             $this->db->delete('like_artikel');
         } else {
             // Jika data belum terdaftar, tambahkan data baru
             $data = array(
                 'userid' => $_SESSION['id_user'],
                 'no_artikel' => $id,
             );
             $this->db->insert('like_artikel', $data);
         }

         $this->db->where('no_artikel', $id);
         $totalLikes = $this->db->count_all_results('like_artikel');
 
         return $totalLikes;
    }

    public function likesComment($id){
        // Mengecek apakah data sudah terdaftar
        $this->db->where('userid', $_SESSION['id_user']);
        $this->db->where('id_comment', $id);
        $query = $this->db->get('like_comment');

        if ($query->num_rows() > 0) {
            $this->db->where('userid', $_SESSION['id_user']);
            $this->db->where('id_comment', $id);
            $this->db->delete('like_comment');
        } else {
            // Jika data belum terdaftar, tambahkan data baru
            $data = array(
                'userid' => $_SESSION['id_user'],
                'id_comment' => $id,
            );
            $this->db->insert('like_comment', $data);
        }

        $this->db->where('id_comment', $id);
        $totalLikes = $this->db->count_all_results('like_comment');

        return $totalLikes;
   }



    public function getTemplateById($id) {
        $this->db->where('no_template',$id);
        $query = $this->db->get('template')->row();
        return $query;
    }

    public function getComment($id) {
        $this->db->where('no_artikel',$id);
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit(10); 
        $query = $this->db->get('comment_artikel');
        return $query;
    }

    public function getTemplateBySlug($id) {
        $this->db->where('slug',$id);
        $query = $this->db->get('template')->row();
        return $query;
    }

    public function getDetail($id,$urutan) {
        $this->db->where('no_artikel',$id);
        $this->db->where('urutan',$urutan);
        $query = $this->db->get('detail_artikel');
        return $query->row();
    }

    public function getArtikel($slug) {
        $this->db->where('slug',$slug);
        $query = $this->db->get('artikel')->row();
        return $query;
    }

    public function cekSlug($input_data) {
        // Cek keberadaan data dengan menggunakan query database
        $query = $this->db->get_where('artikel', array('slug' => $input_data));

        // Jika data tidak ditemukan
        if ($query->num_rows() === 0) {
            return $input_data;
        } else {
            $random_number = rand(100, 999);
            $modified_data = $input_data . '-' . $random_number;
            return $modified_data;
        }
    }

}