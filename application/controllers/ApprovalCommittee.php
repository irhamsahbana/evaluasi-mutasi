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

# ************ Begin Menu Usulan Evaluasi Masuk  & Telah Ditanggapi ******************
    public function tampilanUsulanEvaluasiMasuk()
    {
        $data = array(
            'isi'                   => 'user/contents/approval_committee/tabelUsulanEvaluasiMasuk',
            'title'                 => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'usulan_masuk'          => $this->M_ApprovalCommittee->usulanLembarEvaluasiMasuk()
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanUsulanEvaluasiSelesai()
    {
        $data = array(
            'isi'               => 'user/contents/approval_committee/tabelUsulanEvaluasiSelesai',
            'title'             => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'usulan_masuk'      => $this->M_ApprovalCommittee->usulanLembarEvaluasiMasuk()
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanRincianUsulanEvaluasiMasuk($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);
        $where_approved = array(
            'id_usulan'     => $id_usulan,
            'approvement'   => 'approved'
        );

        $data = array(
            'isi'                       => 'user/contents/approval_committee/detailUsulanEvaluasiMasuk',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_surat'                => $this->Crud->gw('tb_usulan_evaluasi', $where),
            'usulan_pegawai'            => $this->Crud->gw('tb_usulan_evaluasi_pegawai', $where),
            'usulan_approval'           => $this->M_AdministratorInduk->rincianApprovalUsulan($where),
            'jumlah_approvement'        => $this->Crud->cw('tb_approvement', $where),
            'jumlah_approved'           => $this->Crud->cw('tb_approvement', $where_approved),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doSetujuiPegawai($id_usulan, $id_approval, $nip_usulan)
    {
        $where = array(
            'id_usulan'     => $id_usulan,
            'id_approval'   => $id_approval,
            'nip_usulan'    => $nip_usulan
        );

        $data = array(
            'approvement'   => 'approved'
        );

        $this->Crud->u('tb_approvement', $data, $where);
        $this->session->set_flashdata('alert_success', 'Pegawai '.$nip_usulan.' disetujui!');
        redirect('ApprovalCommittee/tampilanRincianUsulanEvaluasiMasuk/'.$id_usulan);
    }

    public function doTolakPegawai($id_usulan, $id_approval, $nip_usulan)
    {
        $where = array(
            'id_usulan'     => $id_usulan,
            'id_approval'   => $id_approval,
            'nip_usulan'    => $nip_usulan
        );

        $data = array(
            'approvement'   => 'not_approved'
        );

        $this->Crud->u('tb_approvement', $data, $where);
        $this->session->set_flashdata('alert_danger', 'Pegawai '.$nip_usulan.' ditolak!');
        redirect('ApprovalCommittee/tampilanRincianUsulanEvaluasiMasuk/'.$id_usulan);
    }

    public function doTinjauKembalipegawai($id_usulan, $id_approval, $nip_usulan)
    {
        $where = array(
            'id_usulan'     => $id_usulan,
            'id_approval'   => $id_approval,
            'nip_usulan'    => $nip_usulan
        );

        $data = array(
            'approvement'   => 'under_review'
        );

        $this->Crud->u('tb_approvement', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Pegawai '.$nip_usulan.' ditinjau kembali!');
        redirect('ApprovalCommittee/tampilanRincianUsulanEvaluasiMasuk/'.$id_usulan);
    }
# ************ End Menu Usulan Evaluasi Masuk  & Telah Ditanggapi ******************

    
}