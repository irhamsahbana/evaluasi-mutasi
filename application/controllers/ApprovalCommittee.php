<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApprovalCommittee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if ($this->session->userdata('status') != "login") {
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
}