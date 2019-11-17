<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {
    
        //Database pengaturan
        function get_all(){
            $this->db->select('*');
            $this->db->from('pengaturan');
            $this->db->order_by('id_pengaturan', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function edit($data){
            $this->db->where('id_pengaturan', $data['id_pengaturan']);
            return $this->db->update('pengaturan', $data);
        }
        //End database pengaturan

        //Database 
        function tambah_pengaturan($data){
            $this->db->insert('pengaturan', $data);
        }
        
        function detail($id_pengaturan) {
            $this->db->select('*');
            $this->db->from('pengaturan');
            $this->db->where('id_pengaturan', $id_pengaturan);
            $this->db->order_by('id_pengaturan', 'desc');
            $query = $this->db->get();
            
            return $query->result();
        }
        
        function hapus($data){
            $this->db->where('id_pengaturan', $data['id_pengaturan']);
            $this->db->delete('pengaturan', $data);
        }
}