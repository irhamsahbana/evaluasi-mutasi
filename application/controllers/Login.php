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
        $this->ModelUser->login($username, $password);
	}

	public function logout(){
        $waktu = date("Y-m-d H:i:s");
        $where = array(
            "id_user" => $this->session->userdata('id_user'),
        );

        $items = array(
            "last_login_user" => $waktu,
        );
        $this->Crud->u('user', $items, $where );
        $this->session->sess_destroy();
        redirect('login');
    }
}
