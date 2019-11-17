<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('tahun_akademik');
            $this->db->order_by('id_tahun_akademik', 'desc');
            $query = $this->db->get();
            return $query->result();
        }
        
        function tambah($data){
            $this->db->insert('tahun_akademik', $data);
        }
        
        
        function update_tahun_akademik($data){
            $this->db->where('id_tahun_akademik', $data['id_tahun_akademik']);
            return $this->db->update('tahun_akademik', $data);
        }
        
        function detail($id_tahun_akademik) {
            $this->db->select('*');
            $this->db->from('tahun_akademik');
            $this->db->where('id_tahun_akademik', $id_tahun_akademik);
            $this->db->order_by('id_tahun_akademik', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_tahun_akademik', $data['id_tahun_akademik']);
            $this->db->delete('tahun_akademik', $data);
        }
}