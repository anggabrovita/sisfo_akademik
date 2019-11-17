<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matkul extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('prodi_model');
        $this->load->model('matkul_model');
    }

    public function index(){
        $prodi = $this->prodi_model->get_all();
        $matkul = $this->matkul_model->get_all();

        $data = array('title' => 'Halaman Data Prodi',
                    'prodi' => $prodi,
                    'matkul' => $matkul,
                    'isi' => 'admin/akademik/matkul/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah
    public function tambah_matkul(){
        $prodi = $this->prodi_model->get_all();
            
        $this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|trim|is_unique',[
            'required' => '%s harus diisi.',
            'is_unique'=> '%s sudah ada. Silahkan buat baru.'
        ]);
        $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('sks', 'SKS', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data = array('title' => 'Tambah Mata Kuliah',
                'prodi' => $prodi,
                'isi' => 'admin/akademik/matkul/tambah');
    $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
            $input = $this->input;
            
            $data = ['id_prodi' => $input->post('id_prodi', true),
                    'kode_matkul' => $input->post('kode_matkul', true),
                    'nama_matkul' => $input->post('nama_matkul', true),
                    'sks' => $input->post('sks', true),
                    'semester' => $input->post('semester', true)
        ];
        $this->matkul_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/matkul'), 'refresh');
        }
    }

    //Edit
    public function update_matkul($id_matkul){
        $matkul = $this->matkul_model->detail($id_matkul);
        $prodi = $this->prodi_model->get_all();
            
        $this->form_validation->set_rules('kode_matkul', 'Kode Mata Kuliah', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('sks', 'SKS', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);

        if ($this->form_validation->run() == false){
        $data = array('title' => 'Update Mata Kuliah : '.$matkul->nama_matkul,
                'prodi'       => $prodi,
                'matkul'     => $matkul,
                'isi' => 'admin/akademik/matkul/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $input = $this->input;
            
            $data = ['id_matkul' => $id_matkul,
                    'id_prodi' => $input->post('id_prodi', true),
                    'kode_matkul' => $input->post('kode_matkul', true),
                    'nama_matkul' => $input->post('nama_matkul', true),
                    'sks' => $input->post('sks', true),
                    'semester' => $input->post('semester', true)
        ];
        $this->matkul_model->update_matkul($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/matkul'), 'refresh');
        }
    }
    
    //Hapus
    public function hapus_prodi($id){
        $data = array('id_matkul' => $id);
        $this->matkul_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/matkul', 'refresh');
    }
}
