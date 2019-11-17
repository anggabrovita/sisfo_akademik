<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {
    
   function get_all(){
        
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->order_by('id_kontak', 'desc');
        $query = $this->db->get();
        return $query->row();
    }
    
    function update_kontak($data){
        $this->db->where('id_kontak', $data['id_kontak']);
        return $this->db->update('kontak', $data);
    }
       
}