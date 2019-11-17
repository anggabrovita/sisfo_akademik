<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul_model extends CI_Model {
    
        function get_all(){
        $this->db->select('matkul.*,prodi.nama_prodi');
        $this->db->from('matkul');
        $this->db->join('prodi', 'prodi.id_prodi = matkul.id_prodi', 'left');
        $this->db->order_by('id_matkul', 'desc');
        $query = $this->db->get();
        return $query->result();
        }

        function get(){
        $this->db->select('*');
        $this->db->from('matkul');
        $this->db->order_by('id_matkul', 'desc');
        $query = $this->db->get();
        return $query->result();
        }
        
        function tambah($data){
            $this->db->insert('matkul', $data);
        }
        
        
        function update_matkul($data){
            $this->db->where('id_matkul', $data['id_matkul']);
            return $this->db->update('matkul', $data);
        }
        
        function detail($id_matkul) {
            $this->db->select('*');
            $this->db->from('matkul');
            $this->db->where('id_matkul', $id_matkul);
            $this->db->order_by('id_matkul', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_matkul', $data['id_matkul']);
            $this->db->delete('matkul', $data);
        }
}