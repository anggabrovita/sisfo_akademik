<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_akademik extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('tahun_akademik_model');
    }

    public function index(){
        $tahun_akademik = $this->tahun_akademik_model->get_all();

        $data = array('title' => 'Halaman Data Tahun Akademik',
                    'tahun_akademik' => $tahun_akademik,
                    'isi' => 'admin/akademik/tahun_akademik/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah
    public function tambah_tahun_akademik(){
        $tahun_akademik = $this->tahun_akademik_model->get_all();
            
        $this->form_validation->set_rules('tahun_akademik', 'Tahun akademik', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data = array('title' => 'Tambah Tahun Akademik',
                'tahun_akademik'     => $tahun_akademik,
                'isi' => 'admin/akademik/tahun_akademik/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
            $input = $this->input;
            
            $data = [
            'tahun_akademik' => $input->post('tahun_akademik', true),
            'semester' => $input->post('semester', true)
        ];
        $this->tahun_akademik_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/tahun_akademik'), 'refresh');
        }
    }

    //Edit
    public function update_tahun_akademik($id_tahun_akademik){
            
        $this->form_validation->set_rules('tahun_akademik', 'Tahun Akademik', 'required',[
        'required' => '%s harus diisi.']);

        $this->form_validation->set_rules('semester', 'Semester', 'required',[
        'required' => '%s harus diisi.']);
            
        if ($this->form_validation->run() == false){
        $tahun_akademik = $this->tahun_akademik_model->detail($id_tahun_akademik);
        $data = array('title' => 'Update Tahun Akademik : '.$tahun_akademik->tahun_akademik,
                'tahun_akademik'     => $tahun_akademik,
                'isi' => 'admin/akademik/tahun_akademik/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $input = $this->input;
            
            $data = [
            'id_tahun_akademik' => $id_tahun_akademik,
            'tahun_akademik' => $input->post('tahun_akademik', true),
            'semester' => $input->post('semester', true)
        ];
        $this->tahun_akademik_model->update_tahun_akademik($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/tahun_akademik'), 'refresh');
        }
    }
    
    //Hapus
    public function hapus_tahun_akademik($id){
        $data = array('id_tahun_akademik' => $id);
        $this->tahun_akademik_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/tahun_akademik', 'refresh');
    }
}
