<?php
use GuzzleHttp\Client;

class Bonus_model extends CI_model {
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/web-api/monitoring-karyawan/api/',
            'auth' => ['admin','1234'],
        ]);
    }

    public function getAllBonus()
    {
        $response = $this->_client->request('GET', 'bonus',[
            'query' => [
                'API_Key' => 'mykey123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getBonusByID($id)
    {
        $response = $this->_client->request('GET', 'bonus',[
            'query' => [
                'API_Key'   => 'mykey123',
                'id_bonus'  => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function addDataBonus()
    {
        $data = [
            "id_data_karyawan"  => $this->input->post('id_data_karyawan', true),
            "bulan"             => $this->input->post('bulan', true),
            "bonus"             => $this->input->post('bonus', true),
            'API_Key'           => 'mykey123'
        ];

        $response = $this->_client->request('POST', 'bonus', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function updateDataBonus()
    {
        $data = [
            "id_data_karyawan"  => $this->input->post('id_data_karyawan', true),
            "bulan"             => $this->input->post('bulan', true),
            "bonus"             => $this->input->post('bonus', true),
            "id_bonus"          => $this->input->post('id_bonus', true),
            'API_Key'           => 'mykey123'
        ];

        $response = $this->_client->request('PUT', 'bonus', [
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }

    public function deleteDataBonus($id)
    {
        $response = $this->_client->request('DELETE', 'bonus',[
            'form_params' => [
                'id_bonus'  => $id,
                'API_Key'   => 'mykey123'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result;
    }
}