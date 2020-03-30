<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalCommittee extends CI_Controller {

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

    public function tampilanApprovalCommittee()
    {
        $data = array(
            'isi' => 'user/contents/approval_committee/tabelApprovalCommittee',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_pegawai' => $this->Crud->ga('tb_approval_committee'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddPegawai() {
        $input        = $this->input->post(NULL, TRUE);
        $data_pegawai = array(
            'nip'                       => $input['nipeg'],
            'nama_approval'             => $input['nama_approval'],
            'file_ttd'                  => $input['tanda_tangan'],
        );
        $this->db->set('id_approval', 'UUID()', FALSE);
        $this->db->insert('tb_approval_committee', $data_pegawai);
        redirect('ApprovalCommittee/tampilanApprovalCommittee');
    }

}