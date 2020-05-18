<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministratorUnit extends CI_Controller
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

    # ************ Begin Menu Lembar Evaluasi ******************
    public function tampilanUsulanLembarEvaluasi()
    {
        $where = array('status_usulan' => 'diterima');

        $data = array(
            'isi'         => 'user/contents/administrator_unit/tabelUsulanLembarEvaluasi',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_diterima' => $this->Crud->gw('tb_usulan_evaluasi', $where),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanAddUsulanLembarEvaluasi()
    {
        $data = array(
            'isi'         => 'user/contents/administrator_unit/addUsulanLembarEvaluasi',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'area'        => $this->Crud->ga('tb_business_area'),
            'approval'    => $this->M_AdministratorUnit->getDataApproval(),
            'posisi'      => $this->Crud->ga('tb_posisi_approval_committee'),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function autoFillUsulanPegawai()
    {
        $id_pegawai = $this->input->post('nip', FALSE);
        $dataPeg = $this->M_AdministratorUnit->getPegawaiById($id_pegawai)->result();
        echo json_encode($dataPeg);
    }

    public function getPersonnelSubarea()
    {
        $business_area = $this->input->post('id', TRUE);
        $data = $this->Crud->gw('tb_personnel_area', array('business_area' => $business_area));
        echo json_encode($data);
    }

    public function getSebutanJabatan()
    {
        $personnel_subarea = $this->input->post('id', TRUE);
        $data = $this->Crud->gwo('tb_jabatan', array('personnel_subarea' => $personnel_subarea), 'urutan_dalam_org');
        echo json_encode($data);
    }

    public function doAddUsulan()
    {
        $id_administrator = $this->session->userdata('id_administrator');
        $tgl_usulan       = date('y-m-d h:i:s');
        $id_usulan        = str_replace(' ', '_', $tgl_usulan);
        $no_surat         = '-';
        $nip              = $this->input->post('nip_usulan');
        $jabatan          = $this->input->post('jabatan');
        $id_approval      = $this->input->post('nama_usulan_approval');
        $posisi           = $this->input->post('posisi');

        $data_usulan = array(
            'id_usulan'            => $id_usulan,
            'id_administrator'     => $id_administrator,
            'tgl_usulan'           => $tgl_usulan,
            'no_surat'             => $no_surat,
            'status_usulan'        => 'dipending',
            'alasan_ditolak'       => '-',
        );
        $this->db->insert('tb_usulan_evaluasi', $data_usulan);

        for ($count = 0; $count < count($nip); $count++) {
            $data_pegawai = array(
                'id_usulan'                      => $id_usulan,
                'nip'                            => $nip[$count],
                'id_sebutan_jabatan_usulan'      => $jabatan[$count],
                'keterangan'                     => '-',
            );
            $this->db->insert('tb_usulan_evaluasi_pegawai', $data_pegawai);
        }

        for ($count = 0; $count < count($id_approval); $count++) {
            $data_approval = array(
                'id_usulan'         => $id_usulan,
                'id_approval'       => $id_approval[$count],
                'id_posisi'         => $posisi[$count],
            );
            $this->db->insert('tb_usulan_evaluasi_approval', $data_approval);
        }

        for ($count_approval = 0; $count_approval < count($id_approval); $count_approval++) {
            for ($count_pegawai = 0; $count_pegawai < count($nip); $count_pegawai++) {
                $data_approvement = array(
                    'id_usulan' => $id_usulan,
                    'id_approval' => $id_approval[$count_approval],
                    'nip' => $nip[$count_pegawai],
                    'approvement' => 'belum di-approve',
                );
                $this->db->insert('tb_approvement', $data_approvement);
            }
        }

        $this->session->set_flashdata('alert_success', 'Usulan Telah Ditambahkan!');
        redirect('AdministratorUnit/tampilanUsulanLembarEvaluasi');
    }

    # ************ End Menu Lembar Evaluasi ******************


}
