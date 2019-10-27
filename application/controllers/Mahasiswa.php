<?php
class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMhs();
        $data['judul'] = 'halaman mahasiswa';

        if($this->input->post('keyword')){
            $data['mahasiswa'] = $this->Mahasiswa_model->cariMhs();

        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }


    public function tambah()
    {
        $data['judul'] = 'halaman tambah mahasiswa';
        $this->form_validation->set_rules('inputNama', 'Nama', 'required');
        $this->form_validation->set_rules('inputAsal', 'Asal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah');
            $this->load->view('templates/footer');
        }
        else{
            $this->Mahasiswa_model->tambahDataMhs();
            $this->session->set_flashdata('flash', 'ditambahkan');
            redirect('mahasiswa');
        }
    }

    
    public function ubah($id)
    {
        $data['judul'] = 'halaman ubah mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMhsById($id);

        $this->form_validation->set_rules('inputNama', 'Nama', 'required');
        $this->form_validation->set_rules('inputAsal', 'Asal', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah');
            $this->load->view('templates/footer');
        }
        else{
            $this->Mahasiswa_model->ubahDataMhs();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('mahasiswa');
        }
    }

    

    public function hapus($id){
        $this->Mahasiswa_model->hapusMhsById($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('mahasiswa');

    }

    public function detail($id){
        $data['judul'] = 'halaman detail mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMhsById($id);

        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }


}
