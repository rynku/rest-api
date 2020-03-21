<?php
Class ClientMbl extends CI_Controller{
    
    private $_client;
    function __construct() {
        parent::__construct();
    }
    
    // menampilkan data mahasiswa
    function index(){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'http://localhost/rest-api/apiMbl');
        $data['data'] = json_decode($response->getBody()->getContents());
        $this->load->view('crud/listMbl',$data);
    }
    public function add()
    {
        $this->load->view('crud/addMbl');
    }
    // insert data mahasiswa
    function create(){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('POST', 'http://localhost/rest-api/apiMbl',[
            'form_params' => [
                'no'=>$this->input->post('no'),
                'tipe_mobil'=>$this->input->post('tipe_mobil'),
                'tahun'=>$this->input->post('tahun'),
                'sewa'=>$this->input->post('sewa')
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('clientMbl'),'refresh');
    }
    
    // edit data mahasiswa
    function edit($id){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('GET', 'http://localhost/rest-api/apiMbl',[
            'query' => [
                'no'=>$id
            ]
        ]);
        $data['data'] = json_decode($response->getBody()->getContents())[0];

        $this->load->view('crud/editMbl',$data);
    }
    
    public function update()
    {
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('PUT', 'http://localhost/rest-api/apiMbl',[
            'json' => [
                'no'=>$this->input->post('no'),
                'tipe_mobil'=>$this->input->post('tipe_mobil'),
                'tahun'=>$this->input->post('tahun'),
                'sewa'=>$this->input->post('sewa'),
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('clientMbl'),'refresh');
    }
    
    // delete data mahasiswa
    function delete($id){
        // Create a client with a base URI
        $client = new GuzzleHttp\Client();
        // Send a request to https://foo.com/api/test
        $response = $client->request('DELETE', 'http://localhost/rest-api/apiMbl',[
            'form_params' => [
                'no'=>$id,
            ]
        ]);
        // echo $response->getBody()->getContents();
        return redirect(base_url('clientMbl'),'refresh');
    }
}