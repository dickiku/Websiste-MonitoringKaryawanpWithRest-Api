<?php 

class Bonus extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Bonus';
        $data['aktif'] = 'Bonus';
        $data['bonus'] = $this->Bonus_model->getAllBonus();

        $this->load->view('templates/header', $data);
        $this->load->view('bonus/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul']      = 'Form Tambah Bonus';
        $data['aktif']      = 'Bonus';
        $data['bulan']      = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $data['karyawan']   = $this->Karyawan_model->getAllKaryawan();

        $this->form_validation->set_rules('id_data_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('bonus', 'Bonus', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('bonus/add_bonus',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Bonus_model->addDataBonus();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('bonus');
        }
    }

    public function update($id)
    {
        $data['bonus']      = $this->Bonus_model->getBonusByID($id);
        $data['judul']      = 'Form Tambah Bonus';
        $data['aktif']      = 'Bonus';
        $data['bulan']      = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $data['karyawan']   = $this->Karyawan_model->getAllKaryawan();

        $this->form_validation->set_rules('id_data_karyawan', 'Nama', 'required');
        $this->form_validation->set_rules('bulan', 'Bulan', 'required');
        $this->form_validation->set_rules('bonus', 'Bonus', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('bonus/update_bonus',$data);
            $this->load->view('templates/footer');
        } else {
            $this->Bonus_model->updateDataBonus();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('bonus');
        }
    }

    public function delete($id)
    {
        $this->Bonus_model->deleteDataBonus($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('bonus');
    }
}