<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    // public function __construct() {
    //     parent::__construct();
    //     if(!$this->session->userdata('email')){
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
    //         redirect('auth');
    //     }
    // }

    public function index(){
        $dosen = $this->dosen_model->get_all();
        $data = array('title' => 'Halaman Administrator',
                    'dosen'=>$dosen,    
                    'isi' => 'home/home');
        $this->load->view('layout/wrapper', $data, FALSE);
    }
}
