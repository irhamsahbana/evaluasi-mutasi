<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){
		$this->load->view('login/login');
	}

	public function cekLogin(){
		$username = $this->input->post('username');
        $cek_pass = $this->input->post('password');
        $password = md5($cek_pass);
        $this->ModelAdmin->login($username, $password);
	}

	public function logout(){
        $waktu = date("Y-m-d H:i:s");
        $where = array(
            "id_admin" => $this->session->userdata('id_admin'),
        );

        $items = array(
            "last_login_admin" => $waktu,
        );
        $this->Crud->u('admin', $items, $where );
        $this->session->sess_destroy();
        redirect('login');
    }
}
