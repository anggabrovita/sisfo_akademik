<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('prodi_model');
        $this->load->model('mahasiswa_model');
    }

    public function index(){
        $prodi = $this->prodi_model->get_all();
        $mahasiswa = $this->mahasiswa_model->get_all();

        $data = array('title' => 'Halaman Data Mahasiswa',
                    'prodi' => $prodi,
                    'mahasiswa' => $mahasiswa,
                    'isi' => 'admin/akademik/mahasiswa/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    //Tambah
    public function tambah_mahasiswa(){
        $prodi = $this->prodi_model->get_all();

        $this->form_validation->set_rules('npm', 'NPM', 'required|trim|is_unique[mahasiswa.npm]',[
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
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);

        if ($this->form_validation->run()==FALSE) {
        
        $data = array('title' => 'Tambah Mahasiswa',
                'prodi'       => $prodi,
                'isi' => 'admin/akademik/mahasiswa/tambah');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $config['upload_path'] ='assets/admin/img/';
            $config['allowed_types'] ='jpg|png|jpeg';
            $this->load->library('upload',$config);
            
            if($this->upload->do_upload('foto')){
            
            $gbr = $this->upload->data(); 
            //proses insert
            $input = $this->input;
            $data = ['id_prodi' => $input->post('id_prodi', true),
                    'npm' => $input->post('npm', true),
                    'nama_lengkap' => $input->post('nama_lengkap', true),
                    'alamat' => $input->post('alamat', true),
                    'email' => $input->post('email', true),
                    'telepon' => $input->post('telepon', true),
                    'tempat_lahir' => $input->post('tempat_lahir', true),
                    'tanggal_lahir' => $input->post('tanggal_lahir', true),
                    'jenis_kelamin' => $input->post('jenis_kelamin', true),
                    'foto' => $gbr['file_name']
            ];
            $this->mahasiswa_model->tambah_mahasiswa($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/akademik/mahasiswa'), 'refresh');
            }
        }
    }

    //Edit
    public function update_mahasiswa($id_mahasiswa){
        $mahasiswa = $this->mahasiswa_model->get($id_mahasiswa);
        $prodi = $this->prodi_model->get_all();
            
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
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim',[
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
        $data = array('title' => 'Update Mahasiswa : '.$mahasiswa->npm,
                'prodi'       => $prodi,
                'mahasiswa'     => $mahasiswa,
                'isi' => 'admin/akademik/mahasiswa/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //kalau tidak ada error
        }else{
            $gbr = array('upload_data' => $this->upload->data());
            $input = $this->input;
            
            $data = ['id_mahasiswa' => $id_mahasiswa,
                    'id_prodi' => $input->post('id_prodi', true),
                    'npm' => $input->post('npm', true),
                    'nama_lengkap' => $input->post('nama_lengkap', true),
                    'alamat' => $input->post('alamat', true),
                    'email' => $input->post('email', true),
                    'telepon' => $input->post('telepon', true),
                    'tempat_lahir' => $input->post('tempat_lahir', true),
                    'tanggal_lahir' => $input->post('tanggal_lahir', true),
                    'jenis_kelamin' => $input->post('jenis_kelamin', true),
                    'foto'        => $gbr['upload_data']['file_name']
        ];
        $this->mahasiswa_model->update_mahasiswa($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/mahasiswa'), 'refresh');
        }}else{
        //Edit tanpa mengganti gambar
        $input = $this->input;
        
        $data = ['id_mahasiswa' => $id_mahasiswa,
                'id_prodi' => $input->post('id_prodi', true),
                'npm' => $input->post('npm', true),
                'nama_lengkap' => $input->post('nama_lengkap', true),
                'alamat' => $input->post('alamat', true),
                'email' => $input->post('email', true),
                'telepon' => $input->post('telepon', true),
                'tempat_lahir' => $input->post('tempat_lahir', true),
                'tanggal_lahir' => $input->post('tanggal_lahir', true),
                'jenis_kelamin' => $input->post('jenis_kelamin', true),
                // 'foto'        => $gbr['upload_data']['file_name']
            ];
            $this->mahasiswa_model->update_mahasiswa($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/akademik/mahasiswa'), 'refresh');
        }}
        $data = array('title' => 'Update Mahasiswa : '.$mahasiswa->npm,
                'prodi'       => $prodi,
                'mahasiswa'     => $mahasiswa,
                'isi' => 'admin/akademik/mahasiswa/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Detail
    public function detail_mahasiswa($id_mahasiswa){
        $mahasiswa = $this->mahasiswa_model->detail($id_mahasiswa);
        $data = array('title' => 'Update Mahasiswa',
                'mahasiswa'     => $mahasiswa,
                'isi' => 'admin/akademik/mahasiswa/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    
    
    //Hapus
    public function hapus_mahasiswa($id_mahasiswa){
        $data = array('id_mahasiswa' => $id_mahasiswa);
        $this->mahasiswa_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/mahasiswa', 'refresh');
    }
}
