<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('prodi_model');
        $this->load->model('dosen_model');
    }

    public function index(){
        $prodi = $this->prodi_model->get_all();
        $dosen = $this->dosen_model->get_all();

        $data = array('title' => 'Halaman Data Dosen',
                    'prodi' => $prodi,
                    'dosen' => $dosen,
                    'isi' => 'admin/akademik/dosen/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Tambah
    public function tambah_dosen(){
        $dosen = $this->dosen_model->get_all();

        $this->form_validation->set_rules('nid', 'NID', 'required|trim|is_unique[dosen.nid]',[
            'required' => '%s harus diisi.',
            'is_unique'=> '%s sudah terdaftar. Buat baru!'
        ]);
          
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);

        if ($this->form_validation->run()==FALSE) {
        
        $data = array('title' => 'Tambah Dosen',
                'dosen'       => $dosen,
                'isi' => 'admin/akademik/dosen/tambah');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $config['upload_path'] ='assets/admin/img/';
            $config['allowed_types'] ='jpg|png|jpeg';
            $this->load->library('upload',$config);
            
            if($this->upload->do_upload('foto')){
            
            $gbr = $this->upload->data(); 
            //proses insert
            $input = $this->input;
            $data = ['nid' => $input->post('nid', true),
                    'nama_lengkap' => $input->post('nama_lengkap', true),
                    'alamat' => $input->post('alamat', true),
                    'email' => $input->post('email', true),
                    'telepon' => $input->post('telepon', true),
                    'foto' => $gbr['file_name']
            ];
            $this->dosen_model->tambah_dosen($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect(base_url('admin/akademik/dosen'), 'refresh');
            }
        }
    }

    //Edit
    public function update_dosen($id_dosen){
        $dosen = $this->dosen_model->get($id_dosen);
            
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
        'required' => '%s harus diisi.']);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run()){
        //Cek jika gambar diganti
        if(!empty($_FILES['foto']['name'])){

        $config['upload_path'] ='./assets/admin/img/';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] ='2048';
        $this->load->library('upload',$config);
        
        if(!$this->upload->do_upload('foto')){
        //end validasi
        $data = array('title' => 'Update Dosen : '.$dosen->nid,
                'dosen'     => $dosen,
                'isi' => 'admin/akademik/dosen/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $gbr = array('upload_data' => $this->upload->data());
            $input = $this->input;
            
            $data = ['id_dosen' => $id_dosen,
                    'nid' => $input->post('nid', true),
                    'nama_lengkap' => $input->post('nama_lengkap', true),
                    'alamat' => $input->post('alamat', true),
                    'email' => $input->post('email', true),
                    'telepon' => $input->post('telepon', true),
                    'foto' => $gbr['upload_data']['file_name']
        ];
        $this->dosen_model->update_dosen($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect(base_url('admin/akademik/dosen'), 'refresh');
        }}else{
        //Edit tanpa mengganti gambar
        $input = $this->input;
        
        $data = ['id_dosen' => $id_dosen,
                'nid' => $input->post('nid', true),
                'nama_lengkap' => $input->post('nama_lengkap', true),
                'alamat' => $input->post('alamat', true),
                'email' => $input->post('email', true),
                'telepon' => $input->post('telepon', true),
                // 'foto'        => $gbr['upload_data']['file_name']
            ];
            $this->dosen_model->update_dosen($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/akademik/dosen'), 'refresh');
        }}
        $data = array('title' => 'Update Dosen : '.$dosen->nid,
                'dosen'     => $dosen,
                'isi' => 'admin/akademik/dosen/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Detail
    public function detail_dosen($id_dosen){
        $dosen = $this->dosen_model->detail($id_dosen);
        $data = array('title' => 'Update Dosen',
                'dosen'     => $dosen,
                'isi' => 'admin/akademik/dosen/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
    
    //Hapus
    public function hapus_dosen($id_dosen){
        $data = array('id_dosen' => $id_dosen);
        $this->dosen_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/dosen', 'refresh');
    }
}
