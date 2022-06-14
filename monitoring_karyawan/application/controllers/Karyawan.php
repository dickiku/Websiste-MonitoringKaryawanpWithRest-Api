<?php 

class Karyawan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Karyawan';
        $data['aktif'] = 'Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getAllKaryawan();
        $this->load->view('templates/header', $data);
        $this->load->view('karyawan/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Form Tambah Data Karyawan';
        $data['divisi'] = ['Acounting', 'IT Support', 'IT Developer', 'Marketing', 'Customer Service'];
        $data['kelamin'] = ['Laki - Laki', 'Permpuan'];
        $data['aktif'] = 'Data Karyawan';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tlp', 'No Telepon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/add_karyawan',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->addDataKaryawan();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('karyawan');
        }
    }

    public function delete($id)
    {
        $this->Karyawan_model->deleteDataKaryawan($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('karyawan');
    }

    public function update($id)
    {
        $data['judul'] = 'Form Update Data Karyawan';
        $data['karyawan'] = $this->Karyawan_model->getKaryawanByID($id);
        $data['divisi'] = ['Acounting', 'IT Support', 'IT Developer', 'Marketing', 'Customer Service']; 
        $data['kelamin'] = ['Laki - Laki', 'Permpuan'];
        $data['aktif'] = 'Data Karyawan';

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tlp', 'No Telepon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('karyawan/update_karyawan',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Karyawan_model->updateDataKaryawan();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('karyawan');
        }
    }
}