<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use chriskacerguis\RestServer\RestController;
class ApiMbl extends RestController {

	function __construct()
    {
        // Construct the parent class
        parent:: __construct();
	}
	public function index_get(){
		// testing response
		$no = $this->get('no');
        if ($no == '') {
            $kontak = $this->db->get('mobil')->result();
        } else {
            $this->db->where('no', $no);
            $kontak = $this->db->get('mobil')->result();
        }
        $this->response($kontak, 200);
    }
    
    public function index_post()
    {
        $data = array(
            'no'  => $this->post('no'),
            'tipe_mobil'  => $this->post('tipe_mobil'),
            'tahun'   => $this->post('tahun'),
            'sewa' => $this->post('sewa')
        );
        $insert = $this->db->insert('mobil', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_put() {
        $no = $this->put('no');
        $data = array(
            'no'  => $this->put('no'),
            'tipe_mobil'  => $this->put('tipe_mobil'),
            'tahun'   => $this->put('tahun'),
            'sewa' => $this->put('sewa')
        );
        $this->db->where('no', $no);
        $update = $this->db->update('mobil', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    public function index_delete() {
        $id = $this->delete('no');
        
        $this->db->where('no', $id);
        $delete = $this->db->delete('mobil');
        if ($delete) {
            $this->response(array('status' => 'success'.$id), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
