<?php 


class AdminModel extends CI_Model{
    
    public function getTemplate() {
        $query = $this->db->get('template');
        return $query;
    }

    public function addTemplate($data = array()){
        $this->db->insert('template', $data);
    }
}