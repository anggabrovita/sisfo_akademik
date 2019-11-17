<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('jurusan');
            $this->db->order_by('id_jurusan', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        
        function tambah($data){
            $this->db->insert('jurusan', $data);
        }
        
        
        function update_jurusan($data){
            $this->db->where('id_jurusan', $data['id_jurusan']);
            return $this->db->update('jurusan', $data);
        }
        
        function detail($id_jurusan) {
            $this->db->select('*');
            $this->db->from('jurusan');
            $this->db->where('id_jurusan', $id_jurusan);
            $this->db->order_by('id_jurusan', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_jurusan', $data['id_jurusan']);
            $this->db->delete('jurusan', $data);
        }
}