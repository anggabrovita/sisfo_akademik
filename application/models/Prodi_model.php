<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi_model extends CI_Model {
    
        function get_all(){
        $this->db->select('prodi.*,jurusan.nama_jurusan');
        $this->db->from('prodi');
        $this->db->join('jurusan', 'jurusan.id_jurusan = prodi.id_jurusan', 'left');
        $this->db->order_by('id_prodi', 'desc');
        $query = $this->db->get();
        return $query->result();
        }
        
        function tambah($data){
            $this->db->insert('prodi', $data);
        }
        
        
        function update_prodi($data){
            $this->db->where('id_prodi', $data['id_prodi']);
            return $this->db->update('prodi', $data);
        }
        function get($id_prodi) {
            $this->db->select('*');
            $this->db->from('prodi');
            $this->db->where('id_prodi', $id_prodi);
            $this->db->order_by('id_prodi', 'desc');
            $query = $this->db->get();
            
            return $query->result();
        }
        function detail($id_prodi) {
            $this->db->select('prodi.*,jurusan.nama_jurusan ');
            $this->db->from('prodi');
            $this->db->join('jurusan', 'jurusan.id_jurusan = prodi.id_jurusan', 'left');
            $this->db->where('id_prodi', $id_prodi);
            $this->db->order_by('id_prodi', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_prodi', $data['id_prodi']);
            $this->db->delete('prodi', $data);
        }
}