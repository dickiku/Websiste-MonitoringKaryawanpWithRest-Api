<?php
use GuzzleHttp\Client;

class Karyawan_model extends CI_model {
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/web-api/monitoring-karyawan/api/',
            'auth' => ['admin','1234'],
        ]);
    }

    public function getAllKaryawan()
    {
        $response = $this->_client->request('GET', 'karyawan',[
            'query' => [
                'API_Key' => 'mykey123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getKaryawanByID($id)
    {
        $response = $this->_client->request('GET', 'karyawan',[
            'query' => [
                'API_Key'   => 'mykey123',
                'id'        => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function addDataKaryawan()
    {
        $data = [
            "nama"      => $this->input->post('nama', true),
            "nik"       => $this->input->post('nik', true),
            "jk"        => $this->input->post('jk', true),
            "alamat"    => $this->input->post('alamat', true),
            "divisi"    => $this->input->post('divisi', true),
            "tlp"       => $this->input->post('tlp', true),
            'API_Key'   => 'mykey123'
        ];

        $response = $this->_client->request('POST', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateDataKaryawan()
    {
        $data = [
            "nama"      => $this->input->post('nama', true),
            "nik"       => $this->input->post('nik', true),
            "jk"        => $this->input->post('jk', true),
            "alamat"    => $this->input->post('alamat', true),
            "divisi"    => $this->input->post('divisi', true),
            "tlp"       => $this->input->post('tlp', true),
            "id"        => $this->input->post('id', true),
            'API_Key'   => 'mykey123'
        ];

        $response = $this->_client->request('PUT', 'karyawan', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function deleteDataKaryawan($id)
    {
        $response = $this->_client->request('DELETE', 'karyawan',[
            'form_params' => [
                'id'        => $id,
                'API_Key'   => 'mykey123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}