<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Karyawan extends RestController
{
    public function __construct()
    {
        parent:: __construct();

        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
    }

    // untuk memanggal data berdasarkan id dan semua data
    public function index_get()
    {
        $id = $this->get('id');

        if ($id === null) {
            $karyawan = $this->Karyawan_model->getKaryawan();
            $this->response([
                'status'    => true,
                'data'      => $karyawan
            ], 200);
        } else {
            $karyawan = $this->Karyawan_model->getKaryawan($id);
            $this->response([
                'status'    => true,
                'data'      => $karyawan
            ], 200);
        }

    }

    // untuk melakukan delete data
    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'provide an id'
            ], 404);
        } else {
            if ($this->Karyawan_model->deleteKaryawan($id) > 0) {
                $this->response([
                    'status'    => true,
                    'id'        => $id,
                    'message'   => 'deleted.'
                ], 200);
            } else {
                $this->response([
                    'status'    => false,
                    'message'   => 'id not found'
                ], 404);
            }
        }
    }

    // untuk melakukan tambah data
    public function index_post()
    {
        $data = [
            'nama'      => $this->post('nama'),
            'nik'       => $this->post('nik'),
            'jk'        => $this->post('jk'),
            'alamat'    => $this->post('alamat'),
            'divisi'    => $this->post('divisi'),
            'tlp'       => $this->post('tlp')
        ];

        if ($this->Karyawan_model->createKaryawan($data) > 0) {
            $this->response([
                'status'    => true,
                'message'   => 'new karyawan has been created.'
            ], 200);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'failed to create new data!'
            ], 404);
        }
    }

    // untuk melakukan update data
    public function index_put()
    {
        $id = $this->put('id');
        
        $data = [
            'nama'      => $this->put('nama'),
            'nik'       => $this->put('nik'),
            'jk'        => $this->put('jk'),
            'alamat'    => $this->put('alamat'),
            'divisi'    => $this->put('divisi'),
            'tlp'       => $this->put('tlp')
        ];

        if ($this->Karyawan_model->updateKaryawan($data, $id) > 0) {
            $this->response([
                'status'    => true,
                'message'   => 'data mahsiswa has been updated.'
            ], 200);
        } else {
            $this->response([
                'status'    => false,
                'message'   => 'failed to update data!'
            ], 404);
        }
    }
}