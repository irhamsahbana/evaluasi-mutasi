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

    public function tampilanUsulanEvaluasiMasuk()
    {
        $id_approval = $this->session->userdata('id_administrator');
        $data = array(
            'isi'         => 'user/contents/approval_committee/tabelUsulanEvaluasiMasuk',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'usulan'      => $this->M_ApprovalCommittee->getDataUsulanMasuk($id_approval),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDetailUsulanMasuk($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);
        $data  = array(
            'isi'        => 'user/contents/approval_committee/detailUsulanEvaluasiMasuk',
            'title'      => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'detail'     => $this->Crud->gw('tb_usulan_evaluasi', $where),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanUsulanEvaluasiSelesai()
    {
        $id_approval = $this->session->userdata('id_administrator');
        $data = array(
            'isi'         => 'user/contents/approval_committee/tabelUsulanEvaluasiSelesai',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'usulan'      => $this->M_ApprovalCommittee->getDataUsulanMasuk($id_approval),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDetailUsulanSelesai($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);
        $data  = array(
            'isi'        => 'user/contents/approval_committee/detailUsulanEvaluasiSelesai',
            'title'      => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'detail'     => $this->Crud->gw('tb_usulan_evaluasi', $where),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }
}