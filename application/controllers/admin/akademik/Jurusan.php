<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('jurusan_model');
    }

    public function index(){
        $jurusan = $this->jurusan_model->get_all();

        $data = array('title' => 'Halaman Data Jurusan',
                    'jurusan' => $jurusan,
                    'isi' => 'admin/akademik/jurusan/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah
    public function tambah_jurusan(){
        $jurusan = $this->jurusan_model->get_all();
            
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data = array('title' => 'Tambah Jurusan',
                'jurusan'     => $jurusan,
                'isi' => 'admin/akademik/jurusan/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
            $input = $this->input;
            
            $data = [
            'kode_jurusan' => $input->post('kode_jurusan', true),
            'nama_jurusan' => $input->post('nama_jurusan', true)
        ];
        $this->jurusan_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/jurusan'), 'refresh');
        }
    }

    //Edit
    public function update_jurusan($id_jurusan){
            
        $this->form_validation->set_rules('kode_jurusan', 'Kode Jurusan', 'required',[
        'required' => '%s harus diisi.']);

        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required',[
        'required' => '%s harus diisi.']);
            
        if ($this->form_validation->run() == false){
        $jurusan = $this->jurusan_model->detail($id_jurusan);
        $data = array('title' => 'Update Jurusan : '.$jurusan->nama_jurusan,
                'jurusan'     => $jurusan,
                'isi' => 'admin/akademik/jurusan/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $input = $this->input;
            
            $data = [
            'id_jurusan' => $id_jurusan,
            'kode_jurusan' => $input->post('kode_jurusan', true),
            'nama_jurusan' => $input->post('nama_jurusan', true)
        ];
        $this->jurusan_model->update_jurusan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/jurusan'), 'refresh');
        }
    }
    
    //Hapus
    public function hapus_jurusan($id){
        $data = array('id_jurusan' => $id);
        $this->jurusan_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/jurusan', 'refresh');
    }
}
