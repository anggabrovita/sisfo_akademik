<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model {
    
        function get_all(){
        $this->db->select('mahasiswa.*,prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->order_by('id_mahasiswa', 'desc');
        $query = $this->db->get();
        return $query->result();
        }
        
        function tambah_mahasiswa($data){
            $this->db->insert('mahasiswa', $data);
        }
        
        
        function update_mahasiswa($data){
            $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
            return $this->db->update('mahasiswa', $data);
        }

        function get($id_mahasiswa) {
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->order_by('id_mahasiswa', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }

        //Ambil data untuk form krs
        function get_it($npm){
        $this->db->select('mahasiswa.*,prodi.nama_prodi');
        $this->db->from('mahasiswa');
        $this->db->where('npm', $npm);
        $this->db->join('prodi', 'prodi.id_prodi = mahasiswa.id_prodi', 'left');
        $this->db->order_by('id_mahasiswa', 'desc');
        $query = $this->db->get();
        return $query->row();
        }     

        function detail($id_mahasiswa) {
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('id_mahasiswa', $id_mahasiswa);
            $this->db->order_by('id_mahasiswa', 'desc');
            $query = $this->db->get();
            
            return $query->result();
        }
        
        function hapus($data){
            $this->db->where('id_mahasiswa', $data['id_mahasiswa']);
            $this->db->delete('mahasiswa', $data);
        }
}