<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('prodi_model');
        $this->load->model('jurusan_model');
    }

    public function index(){
        $prodi = $this->prodi_model->get_all();
        $jurusan = $this->jurusan_model->get_all();

        $data = array('title' => 'Halaman Data Prodi',
                    'prodi' => $prodi,
                    'jurusan' => $jurusan,
                    'isi' => 'admin/akademik/prodi/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah
    public function tambah_prodi(){
        $jurusan = $this->jurusan_model->get_all();
            
        $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data = array('title' => 'Tambah Prodi',
                'jurusan' => $jurusan,
                'isi' => 'admin/akademik/prodi/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
            $input = $this->input;
            
            $data = ['id_jurusan' => $input->post('id_jurusan', true),
                    'kode_prodi' => $input->post('kode_prodi', true),
                    'nama_prodi' => $input->post('nama_prodi', true)
        ];
        $this->prodi_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/prodi'), 'refresh');
        }
    }

    //Edit
    public function update_prodi($id_prodi=null){
        $prodi = $this->prodi_model->detail($id_prodi);
        $jurusan = $this->jurusan_model->get_all();
            
        $this->form_validation->set_rules('kode_prodi', 'Kode Prodi', 'required',[
        'required' => '%s harus diisi.']);

        $this->form_validation->set_rules('nama_prodi', 'Nama Prodi', 'required',[
        'required' => '%s harus diisi.']);

        if ($this->form_validation->run() == false){
        $data = array('title' => 'Update Prodi : '.$prodi->nama_prodi,
                'prodi'       => $prodi,
                'jurusan'     => $jurusan,
                'isi' => 'admin/akademik/prodi/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $input = $this->input;
            
            $data = [
            'id_prodi' => $id_prodi,
            'id_jurusan' => $input->post('id_jurusan'),
            'kode_prodi' => $input->post('kode_prodi', true),
            'nama_prodi' => $input->post('nama_prodi', true)
        ];
        $this->prodi_model->update_prodi($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/prodi'), 'refresh');
        }
    }
    
    //Hapus
    public function hapus_prodi($id){
        $data = array('id_prodi' => $id);
        $this->prodi_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/prodi', 'refresh');
    }
}
