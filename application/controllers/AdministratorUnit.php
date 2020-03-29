<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorUnit extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
    }
    public function index()
    {
        $data;
    }

}