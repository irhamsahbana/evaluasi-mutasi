<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministratorUnit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if ($this->session->userdata('status') != "login") {
            redirect('Login');
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

# ************ Begin Kebetuhan Script ******************
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
# ************ End Kebetuhan Script ******************

    # ************ Begin Menu Lembar Evaluasi ******************
    public function tampilanUsulanLembarEvaluasi()
    {
        $personnel_subarea = $this->session->userdata('personnel_subarea');
        $data = array(
            'isi'                       => 'user/contents/administrator_unit/tabelUsulanLembarEvaluasi',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_PS'    => $this->M_AdministratorUnit->usulanLembarEvaluasiPS($personnel_subarea)
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
        $id_pegawai = $this->input->post('nip', TRUE);
        $dataPeg = $this->M_AdministratorInduk->getPegawaiById($id_pegawai)->result();
        echo json_encode($dataPeg);
    }

    public function autoFillTalenta()
    {
        $id_pegawai = $this->input->post('nip_talenta', TRUE);
        $talentaPeg = $this->M_AdministratorInduk->nilaiTalenta3Terakhir($id_pegawai);
        echo json_encode($talentaPeg);
    }

    public function calculateLamaMenjabat()
    {
        $tgl = $this->input->post('tgl');
        $array = array(
                'lama_menjabat' => berapa_lama($tgl)
            );
        $lama = json_encode($array);
        echo $lama;
    }

    public function doAddUsulanMutasi()
    {
        //data global surat usulan mutasi
        $id_administrator = $this->session->userdata('id_administrator');
        $tgl_usulan       = date('y-m-d H:i:s');
        $id_usulan        = str_replace(' ', '_', $tgl_usulan);
        $id_usulan        = str_replace(':', '-', $id_usulan);
        $tim_approval     = $this->input->post('tim_approval');
        $no_surat         = '-';
        $lokasi_surat     = '-';
        $tgl_surat        = '0000-00-00';
        $status_usulan    = 'dipending';
        $alasan_ditolak   = '-';

        //Header Nilai Talenta
        $thn_1    = $this->input->post('thn_1');
        $thn_2    = $this->input->post('thn_2');
        $thn_3    = $this->input->post('thn_3');
        $smstr_1    = $this->input->post('smstr_1');
        $smstr_2    = $this->input->post('smstr_2');
        $smstr_3    = $this->input->post('smstr_3');

        //Data Pegawai Usulan
        $nip_usulan             = $this->input->post('nip_usulan');
        $nama_usulan            = $this->input->post('nama_usulan');
        $jabatan_skg            = $this->input->post('jabatan_skg');
        $grade_skg              = $this->input->post('grade_skg');
        $tgl_grade_skg          = $this->input->post('tgl_grade_skg');
        $pendidikan_terakhir    = $this->input->post('pendidikan_terakhir');
        $n_talenta_1            = $this->input->post('n_talenta_1');
        $n_talenta_2            = $this->input->post('n_talenta_2');
        $n_talenta_3            = $this->input->post('n_talenta_3');
        $lama_menjabat          = $this->input->post('lama_jabatan_skg');
        $jabatan_usulan         = $this->input->post('jabatan_usulan');
        $keterangan             = '-';

        //Data Approval Committee usulan
        $id_approval        = $this->input->post('id_approval');
        $posisi             = $this->input->post('posisi');
        
        $data_global_surat = array(
            'id_usulan'            => $id_usulan,
            'id_administrator'     => $id_administrator,
            'tgl_usulan'           => $tgl_usulan,
            'no_surat'             => $no_surat,
            'status_usulan'        => $status_usulan,
            'lokasi_surat'         => $lokasi_surat,
            'alasan_ditolak'       => $alasan_ditolak,
            'tgl_surat'            => $tgl_surat,
            'tim_approval'         => $tim_approval,
            'tahun_1'              => $thn_1,
            'tahun_2'              => $thn_2,
            'tahun_3'              => $thn_3,
            'semester_1'           => $smstr_1,
            'semester_2'           => $smstr_2,
            'semester_3'           => $smstr_3
        );
        $this->db->insert('tb_usulan_evaluasi', $data_global_surat);

        for ($count = 0; $count < count($nip_usulan); $count++) {
            $data_pegawai = array(
                'id_usulan'                      => $id_usulan,
                'nip_usulan'                     => $nip_usulan[$count],
                'nama_usulan'                    => $nama_usulan[$count],
                'jabatan_skg'                    => $jabatan_skg[$count],
                'jabatan_usulan'                 => $jabatan_usulan[$count],
                'grade_skg'                      => $grade_skg[$count], 
                'tgl_grade_skg'                  => $tgl_grade_skg[$count],
                'pendidikan_terakhir'            => $pendidikan_terakhir[$count],
                'n_talenta_1'                    => $n_talenta_1[$count],
                'n_talenta_2'                    => $n_talenta_2[$count],
                'n_talenta_3'                    => $n_talenta_3[$count],
                'lama_jabatan_skg'               => $lama_menjabat[$count],
                'keterangan'                     => $keterangan
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
            for ($count_pegawai = 0; $count_pegawai < count($nip_usulan); $count_pegawai++) {
                $data_approvement = array(
                    'id_usulan'     => $id_usulan,
                    'id_approval'   => $id_approval[$count_approval],
                    'nip_usulan'    => $nip_usulan[$count_pegawai],
                    'approvement'   => 'under_review',
                );
                $this->db->insert('tb_approvement', $data_approvement);
            }
        }

        $this->session->set_flashdata('alert_success', 'Data usulan evaluasi mutasi berhasil ditambahkan!');
    }

    public function tampilanRincianLembarEvaluasi($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);
        $where_approved = array(
            'id_usulan'     => $id_usulan,
            'approvement'   => 'approved'
        );

        $data = array(
            'isi'                       => 'user/contents/administrator_induk/tabelRincianUsulanLembarEvaluasi',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_surat'                => $this->Crud->gw('tb_usulan_evaluasi', $where),
            'usulan_pegawai'            => $this->Crud->gw('tb_usulan_evaluasi_pegawai', $where),
            'usulan_approval'           => $this->M_AdministratorInduk->rincianApprovalUsulan($where),
            'jumlah_approvement'        => $this->Crud->cw('tb_approvement', $where),
            'jumlah_approved'           => $this->Crud->cw('tb_approvement', $where_approved),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doDeleteUsulanMutasi($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);

        $this->Crud->d('tb_usulan_evaluasi', $where);
        $this->Crud->d('tb_usulan_evaluasi_pegawai', $where);
        $this->Crud->d('tb_usulan_evaluasi_approval', $where);
        $this->Crud->d('tb_approvement', $where);
        $this->session->set_flashdata('alert_danger', 'Data usulan evaluasi mutasi berhasil dihapus!');
        redirect('AdministratorInduk/tampilanUsulanLembarEvaluasi');
    }

    public function doUpdateDataSurat($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);
        $input = $this->input->post(NULL, TRUE);

        $data_surat = array(
            'no_surat'      => $input['no_surat'],
            'tgl_surat'     => $input['tgl_surat'],
            'lokasi_surat'  => $input['lokasi_surat'],
            'tim_approval'  => $input['tim_approval'],
            'tahun_1'       => $input['thn_1'],
            'tahun_2'       => $input['thn_2'],
            'tahun_3'       => $input['thn_3'],
            'semester_1'    => $input['smstr_1'],
            'semester_2'    => $input['smstr_2'],
            'semester_3'    => $input['smstr_3']
        );

        $this->Crud->u('tb_usulan_evaluasi', $data_surat, $where);
        $this->session->set_flashdata('alert_primary', 'Data Surat Evaluasi Mutasi berhasil disunting!');
        redirect('AdministratorInduk/tampilanRincianLembarEvaluasi/'.$id_usulan);
    }

    public function doUpdateKeterangan($id_usulan, $nip_usulan)
    {
        $where = array(
            'id_usulan'     => $id_usulan,
            'nip_usulan'    => $nip_usulan
        );
        $input = $this->input->post(NULL, TRUE);

        $data_ket = array(
            'keterangan' => $input['keterangan_pegawai']
        );

        $this->Crud->u('tb_usulan_evaluasi_pegawai', $data_ket, $where);
        $this->session->set_flashdata('alert_primary', 'Data Keterangan Pegawai Usulan berhasil disunting!');
        redirect('AdministratorInduk/tampilanRincianLembarEvaluasi/'.$id_usulan);
    }

    public function doDeletePegawaiUsulan($id_usulan, $nip_usulan)
    {
        $where = array(
            'id_usulan'     => $id_usulan,
            'nip_usulan'    => $nip_usulan
        );

        $this->Crud->d('tb_usulan_evaluasi_pegawai', $where);
        $this->Crud->d('tb_approvement', $where);
        $this->session->set_flashdata('alert_primary', 'Data Pegawai Usulan berhasil dihapus!');
        redirect('AdministratorInduk/tampilanRincianLembarEvaluasi/'.$id_usulan);
    }

    # ************ End Menu Lembar Evaluasi ******************


}
