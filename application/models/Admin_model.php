<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {
    
        function get_all(){
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->order_by('id_dosen', 'desc');
        $query = $this->db->get();
        return $query->result();
        }
        
        function tambah_dosen($data){
            $this->db->insert('dosen', $data);
        }
        
        
        function update_dosen($data){
            $this->db->where('id_dosen', $data['id_dosen']);
            return $this->db->update('dosen', $data);
        }
        
        function get($id_dosen) {
            $this->db->select('*');
            $this->db->from('dosen');
            $this->db->where('id_dosen', $id_dosen);
            $this->db->order_by('id_dosen', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }

        function detail($id_dosen) {
            $this->db->select('*');
            $this->db->from('dosen');
            $this->db->where('id_dosen', $id_dosen);
            $this->db->order_by('id_dosen', 'desc');
            $query = $this->db->get();
            
            return $query->result();
        }
        
        function hapus($data){
            $this->db->where('id_dosen', $data['id_dosen']);
            $this->db->delete('dosen', $data);
        }
}