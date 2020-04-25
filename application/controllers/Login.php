<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function index(){
		$this->load->view('login/newLogin');
	}

    public function loginLama(){
        $this->load->view('login/login');
    }

	public function cekLogin(){
		$username = $this->input->post('username');
        $cek_pass = $this->input->post('password');
        $password = md5($cek_pass);
        $this->ModelUser->login($username, $password);
	}

    public function LoginAdmin(){
        $nip = $this->input->post('nip_administrator');
        $password = $this->input->post('password_administrator');
        $this->M_Login->mLoginAdmin($nip, $password);
    }

    public function loginApproval(){
        $nip = $this->input->post('nip_approval');
        $password = $this->input->post('password_approval');
        $this->M_Login->mLoginApproval($nip, $password);
    }

	public function logout(){
        $this->session->sess_destroy();
        redirect('Login');
    }
}
