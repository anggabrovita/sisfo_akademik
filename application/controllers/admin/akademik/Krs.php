<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('krs_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('matkul_model');
        $this->load->model('tahun_akademik_model');
    }

    public function index(){
        $krs = $this->krs_model->get_all();
        $ta = $this->krs_model->get();

        $data = array('title' => 'Halaman Data Krs',
                    'krs' => $krs,
                    'ta' => $ta,
                    'isi' => 'admin/akademik/krs/list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Proses KRS
    public function proses_krs(){
            
        $this->form_validation->set_rules('npm', 'NPM', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data = array('title' => 'Halaman KRS',
                'isi' => 'admin/akademik/krs');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }else{
        $npm = $this->input->post('npm', true);
        $tahun_akademik = $this->input->post('id_tahun_akademik', true);

            if($this->mahasiswa_model->get_it($npm)==null){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NPM Mahasiswa yang Anda masukan belum terdaftar.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/akademik/krs'), 'refresh');
            }
        }
        $npm = $this->input->post('npm', true);
        $tahun_akademik = $this->input->post('tahun_akademik', true);

         $data = array('title'      => 'Halaman Kartu Rencana Studi',
                    'krs_data'      => $this->_bacakrs($npm, $tahun_akademik),
                    'npm'           => $npm,
                    'nama_lengkap'  => $this->mahasiswa_model->get_it($npm)->nama_lengkap,
                    'prodi'         => $this->mahasiswa_model->get_it($npm)->nama_prodi,
                    'semester'      => $this->tahun_akademik_model->detail($tahun_akademik)->semester,
                    'tahun_akademik'=> $this->tahun_akademik_model->detail($tahun_akademik)->tahun_akademik,
                    'id_tahun_akademik' => $this->tahun_akademik_model->detail($tahun_akademik)->id_tahun_akademik,
                    'isi'            => 'admin/akademik/krs/krs_list');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    //Untuk mengambil data ditabel krs
    public function _bacakrs($npm, $tahun_akademik){
        $this->db->select('krs.*,matkul.kode_matkul, matkul.nama_matkul, matkul.sks, mahasiswa.npm');
        $this->db->from('krs');
        $this->db->where('krs.id_tahun_akademik', $tahun_akademik);
        $this->db->where('mahasiswa.npm', $npm);
        $this->db->join('matkul', 'krs.id_matkul = matkul.id_matkul', 'left');
        $this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
        $this->db->order_by('id_krs', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    //End Proses KRS

    //Proses tambah
    public function tambah_krs($npm, $tahun_akademik){

        $data = array('title' => 'Halaman Tambah KRS Mahasiswa',
                    'npm' => $npm,
                    'matkul' => $this->matkul_model->get_all(),
                    'id_tahun_akademik' => $this->tahun_akademik_model->detail($tahun_akademik)->id_tahun_akademik,
                    'tahun_akademik' => $this->tahun_akademik_model->detail($tahun_akademik)->tahun_akademik,
                    'semester' => $this->tahun_akademik_model->detail($tahun_akademik)->semester,
                    'isi' => 'admin/akademik/krs/krs_form');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function simpan_krs(){
        $this->form_validation->set_rules('id_matkul', 'Mata Kuliah', 'required|trim',[
            'required' => '%s harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
            $this->tambah_krs($this->input->post('npm', TRUE),
            $this->input->post('id_tahun_akademik', TRUE) );
    }else{
            $input = $this->input;         
            $data = ['id_mahasiswa' => $input->post('id_mahasiswa', true),
                    'id_tahun_akademik' => $input->post('id_tahun_akademik', true),
                    'id_matkul' => $input->post('id_matkul', true)
        ];
        $this->krs_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/akademik/krs'), 'refresh');
        }
    }

    //Hapus
    public function hapus_krs($id_krs){
        $data = array('id_krs' => $id_krs);
        $this->krs_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/akademik/krs', 'refresh');
    }
}
