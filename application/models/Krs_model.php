<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs_model extends CI_Model {
    
        function get_all(){
            $this->db->select('*');
            $this->db->from('krs');
            $this->db->order_by('id_krs', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        
        function get(){
            $query = $this->db->query('SELECT id_tahun_akademik, CONCAT(
                "T.A ",tahun_akademik, " - ",semester) 
                AS tahun_semester FROM tahun_akademik');
            return $query->result();
        }

        function tambah($data){
            $this->db->insert('krs', $data);
        }
        
        
        function update_krs($data){
            $this->db->where('id_krs', $data['id_krs']);
            return $this->db->update('krs', $data);
        }
        
        function detail($id_krs) {
            $this->db->select('*');
            $this->db->from('krs');
            $this->db->where('id_krs', $id_krs);
            $this->db->order_by('id_krs', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_krs', $data['id_krs']);
            $this->db->delete('krs', $data);
        }
}