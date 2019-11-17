<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    // public function __construct() {
    //     parent::__construct();
    //     if(!$this->session->userdata('email')){
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
    //         redirect('auth');
    //     }
    // }

    public function index(){
        $dosen = $this->db->query("SELECT count(id_dosen) FROM dosen ")->result_array();
        $mahasiswa = $this->db->query("SELECT count(id_mahasiswa) FROM mahasiswa ")->result_array();
        $prodi = $this->db->query("SELECT count(id_prodi) FROM prodi ")->result_array();
        $matkul = $this->db->query("SELECT count(id_matkul) FROM matkul ")->result_array();
        $data = array('title' => 'Halaman Administrator',
                    'dosen'=> $dosen,
                    'mahasiswa'=> $mahasiswa,
                    'prodi'=> $prodi,
                    'matkul'=> $matkul,
                    'isi' => 'admin/dashboard');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}
