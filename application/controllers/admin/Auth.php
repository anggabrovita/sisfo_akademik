<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    // public function __construct() {
    //     parent::__construct();
    //     if(!$this->session->userdata('email')){
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
    //         redirect('auth');
    //     }
    // }
    public function index(){
        $data['title'] = 'Admin Login';
        $this->load->view('admin/login', $data, FALSE);
    }

    public function login(){
        if ($this->session->userdata('email')){
                redirect('admin');
            }
        
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password harus diisi!',
            ]);
            
            if($this->form_validation->run() == FALSE){
            
            $data['title'] = 'Admin Login';
            $this->load->view('admin/login', $data, FALSE);
        }else{
            //validasi sukses
            $this->_login();
        }
    }

    private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $admin = $this->db->get_where('admin', ['email' => $email])->row_array();
        
            if($admin){
                if(password_verify($password, $admin['password'])){
                    $data = [
                        'email' => $admin['email'],
                        'password' => $admin['password']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!</div>');
                    redirect('admin/auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
                redirect('admin/auth');
            }
        }
}
