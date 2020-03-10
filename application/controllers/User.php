<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }
	public function index()
	{
		$data = array(
            'isi' => 'user/contents/testing',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	/****************************************
	Mulai
	Kerjaanya Irham
	jangan sentuh-sentuh diantara komen ini!
	****************************************/
	
	

	/****************************************
	Selesai
	Kerjaanya Irham
	jangan sentuh-sentuh diantara komen ini!
	****************************************/



	/****************************************
	Mulai
	Kerjaanya Ghina
	jangan sentuh-sentuh diantara komen ini!
	****************************************/
	public function tampilanMenuUsulan()
	{
		$data = array(
            'isi' => 'admin/contents/pejabat/menuUsulan',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('admin/_layouts/wrapper', $data);
	}
	

	/****************************************
	Selesai
	Kerjaanya Ghina
	jangan sentuh-sentuh diantara komen ini!
	****************************************/

	

	/****************************************
	Mulai
	Kerjaanya Okti
	jangan sentuh-sentuh diantara komen ini!
	****************************************/

	

	/****************************************
	Selesai
	Kerjaanya Okti
	jangan sentuh-sentuh diantara komen ini!
	****************************************/		
}
