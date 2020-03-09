<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }else if($this->uri->segment(2) == 'admin' and ($this->session->userdata('status_admin') != 'super_admin')){
            redirect('admin');
        }
    }
	public function index()
	{
		$data = array(
            'isi' => 'admin/contents/testing',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
	}
}
