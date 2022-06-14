<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/Format.php";
require APPPATH . "libraries/RestController.php";

use chriskacerguis\RestServer\RestController;

class Bonus extends RestController
{
    public function __construct()
    {
        parent:: __construct();
    }

    // untuk memanggal data berdasarkan id dan semua data
    public function index_get()
    {
        $id = $this->get('id_bonus');

        if ($id === null) {
            $bonus = $this->Bonus_model->getBonus();
            $this->response([
                'status'    => true,
                'data'      => $bonus
            ], 200);
        } else {
            $bonus = $this->Bonus_model->getBonus($id);
            $this->response([
                'status'    => true,
                'data'      => $bonus
            ], 200);
        }

    }

    // untuk melakukan delete data
    public function index_delete()
    {
        $id = $this->delete('id_bonus');

        if ($id === null) {
            $this->response([
                'status'    => false,
                'message'   => 'provide an id'
            ], 404);
        } else {
            if ($this->Bonus_model->deleteBonus($id) > 0) {
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
            'id_data_karyawan'  => $this->post('id_data_karyawan'),
            'bulan'             => $this->post('bulan'),
            'bonus'             => $this->post('bonus')
        ];

        if ($this->Bonus_model->createBonus($data) > 0) {
            $this->response([
                'status'    => true,
                'message'   => 'new bonus has been created.'
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
        $id = $this->put('id_bonus');
        
        $data = [
            'id_data_karyawan'  => $this->put('id_data_karyawan'),
            'bulan'             => $this->put('bulan'),
            'bonus'             => $this->put('bonus')
        ];

        if ($this->Bonus_model->updateBonus($data, $id) > 0) {
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