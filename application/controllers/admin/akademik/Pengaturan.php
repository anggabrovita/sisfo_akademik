<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('pengaturan_model');
    }
    
    //Simpan Pengaturan Umum
    public function index(){
        $pengaturan = $this->pengaturan_model->get_all();

        $data = array('title' => 'Halaman Pengaturan Umum',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/umum');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function simpan(){
        $pengaturan = $this->pengaturan_model->get_all();

        $this->form_validation->set_rules('judul', 'Judul Website', 'required|trim',[
            'required' => 'Judul Website harus diisi.'
        ]);

        $this->form_validation->set_rules('logo', 'Logo Website', 'required|trim',[
            'required' => 'Logo Website harus diisi.'
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => 'Email harus diisi.'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
            'required' => 'Telepon harus diisi.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'alamat harus diisi.'
        ]);
        $this->form_validation->set_rules('facebook', 'Facebook', 'required|trim',[
            'required' => 'Facebook harus diisi.'
        ]);
        $this->form_validation->set_rules('instagram', 'Instagram', 'required|trim',[
            'required' => 'instagram harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        $data = array('title' => 'Halaman Pengaturan Umum',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/umum');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $input = $this->input;
           
            $data = ['id_pengaturan' => $pengaturan->id_pengaturan,
                    'email' => $input->post('email'),
                    'logo' => $input->post('logo'),
                    'judul' => $input->post('judul'),
                    'telepon' => $input->post('telepon'),
                    'alamat' => $input->post('alamat'),
                    'facebook' => $input->post('facebook'),
                    'instagram' => $input->post('instagram'),
        ];
        $this->pengaturan_model->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/pengaturan'), 'refresh');
        }
    }
    //End Pengaturan Umum

    //Simpan Icon
    public function icon(){
        $pengaturan = $this->pengaturan_model->get_all();

        $data = array('title' => 'Halaman Pengaturan Icon',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/icon');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

     public function simpan_icon()
    {
        $pengaturan = $this->pengaturan_model->get_all();

        if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = './assets/admin/foto';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('icon')){
            $data = array('title' => 'Halaman Pengaturan Icon',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/icon');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());

                $data = array('id_pengaturan' => $pengaturan->id_pengaturan,
                            'icon' => $upload_gambar['upload_data']['file_name'] );

                $this->pengaturan_model->edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.<button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect(base_url('admin/akademik/pengaturan/icon'), 'refresh');
            }
            $data = array('title' => 'Halaman Pengaturan Icon',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/icon');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }
    //End Pengaturan icon

    //Pengaturan banner
    public function banner(){

        $pengaturan = $this->pengaturan_model->get_all();
        $data = array('title' => 'Halaman Pengaturan Banner',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/banner');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function simpan_banner()
    {
        $pengaturan = $this->pengaturan_model->get_all();

        if(!empty($_FILES['banner']['name'])){
            $config['upload_path'] = './assets/admin/foto';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('banner')){
            $data = array('title' => 'Halaman Pengaturan Banner',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/banner');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());

                $data = array('id_pengaturan' => $pengaturan->id_pengaturan,
                            'banner' => $upload_gambar['upload_data']['file_name'] );

                $this->pengaturan_model->edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.<button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect(base_url('admin/akademik/pengaturan/banner'), 'refresh');
            }
            $data = array('title' => 'Halaman Pengaturan Banner',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/banner');
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
    }
    //End Pengaturan banner

    //Simpan Pengaturan Informasi Kampus
    public function info(){
        $pengaturan = $this->pengaturan_model->get_all();

        $data = array('title' => 'Halaman Pengaturan Informasi Kampus',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/info');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function simpan_info(){
        $pengaturan = $this->pengaturan_model->get_all();

        $this->form_validation->set_rules('info', 'Informasi Kampus', 'required|trim',[
            'required' => 'instagram harus diisi.'
        ]);

        $this->form_validation->set_rules('tentang', 'Tentang', 'required|trim',[
            'required' => 'tentang harus diisi.'
        ]);
        
        $this->form_validation->set_rules('visi', 'Visi', 'required|trim',[
            'required' => 'visi harus diisi.'
        ]);
        
        $this->form_validation->set_rules('misi', 'Misi', 'required|trim',[
            'required' => 'misi harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        $data = array('title' => 'Halaman Pengaturan Informasi Kampus',
                    'pengaturan' => $pengaturan,
                    'isi' => 'admin/akademik/pengaturan/info');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        }else{
            $input = $this->input;
           
            $data = ['id_pengaturan' => $pengaturan->id_pengaturan,
                    'info' => $input->post('info'),
                    'tentang' => $input->post('tentang'),
                    'visi' => $input->post('visi'),
                    'misi' => $input->post('misi')
        ];
        $this->pengaturan_model->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/pengaturan/info'), 'refresh');
        }
    }
    //End Pengaturan Informasi Kampus

}
