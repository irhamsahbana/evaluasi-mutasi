<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorInduk extends CI_Controller {
    
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

    public function tampilanDataPegawai()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDataPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_pegawai' => $this->M_AdministratorInduk->getDataPegawai(),
            'area' => $this->M_AdministratorInduk->getAreaRows(),
            'subarea' => $this->M_AdministratorInduk->getSubareaRows(),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getSubarea() {
        $subarea = array();
        $business_area = $this->input->post('business_area');
        if($business_area) {
            $con['conditions'] = array('business_area'=>$business_area);
            $subarea = $this->M_AdministratorInduk->getSubareaRows($con);
        }
        echo json_encode($subarea);
    }

    public function doAddPegawai() {
        $input        = $this->input->post(NULL, TRUE);
        $data_pegawai = array(
            'pers_no'                        => $input['pers_no'],
            'nip'                            => $input['nipeg'],
            'nama_pegawai'                   => $input['nama_pegawai'],
            'personnel_subarea'              => $input['personnel_subarea'],
            'org_unit'                       => $input['org_unit'],
            'organizational_unit'            => $input['organizational_unit'],
            'position'                       => $input['position'],
            'nama_panjang_posisi'            => $input['nama_panjang_posisi'],
            'jenjang_main_grp'               => $input['jenjang_main_grp'],
            'jenjang_sub_grp'                => $input['jenjang_sub_grp'],
            'grade'                          => $input['grade'],
            'tgl_grade'                      => $input['tgl_grade'],
            'pendidikan_terakhir'            => $input['pendidikan_terakhir'],
            'talenta_semester_lalu'          => $input['nilai_talenta_i'],
            'talenta_dua_semester_lalu'      => $input['nilai_talenta_ii'],
            'talenta_tiga_semester_lalu'     => $input['nilai_talenta_iii'],
            'gender'                         => $input['gender'],
            'email'                          => $input['email'],
            'tgl_masuk'                      => $input['tanggal_masuk'],
            'agama'                          => $input['religious'],
            'no_telp'                        => $input['telephone_no'],
        );
        $this->db->insert('tb_pegawai', $data_pegawai);
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doDeletePegawai($id){
        $where = array('nip' => $id,);

        $this->Crud->d('tb_pegawai', $where);
        $this->session->set_flashdata('info', 'Data Pegawai Telah Dihapus');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doUpdatePegawai($id){
        $where         = array('nip' => $id);
        $input         = $this->input->post(NULL, TRUE);
        $data_pegawai  = array(
            'pers_no'                        => $input['pers_no'],
            'nip'                            => $input['nipeg'],
            'nama_pegawai'                   => $input['nama_pegawai'],
            'personnel_subarea'              => $input['personnel_subarea'],
            'org_unit'                       => $input['org_unit'],
            'organizational_unit'            => $input['organizational_unit'],
            'position'                       => $input['position'],
            'nama_panjang_posisi'            => $input['nama_panjang_posisi'],
            'jenjang_main_grp'               => $input['jenjang_main_grp'],
            'jenjang_sub_grp'                => $input['jenjang_sub_grp'],
            'grade'                          => $input['grade'],
            'tgl_grade'                      => $input['tgl_grade'],
            'pendidikan_terakhir'            => $input['pendidikan_terakhir'],
            'talenta_semester_lalu'          => $input['nilai_talenta_i'],
            'talenta_dua_semester_lalu'      => $input['nilai_talenta_ii'],
            'talenta_tiga_semester_lalu'     => $input['nilai_talenta_iii'],
            'gender'                         => $input['gender'],
            'email'                          => $input['email'],
            'tgl_masuk'                      => $input['tanggal_masuk'],
            'agama'                          => $input['religious'],
            'no_telp'                        => $input['telephone_no'],
        );
        $this->Crud->u('tb_pegawai', $data_pegawai, $where);
        $this->session->set_flashdata('info', 'Data Pegawai Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function tampilanDaftarBusinessArea()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDaftarBusinessArea',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_area' => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddArea() {
        $input     = $this->input->post(NULL, TRUE);
        $data_area = array(
            'nama_business_area'   => $input['business_area'],
        );
        $this->db->set('business_area', 'UUID()', FALSE);
        $this->db->insert('tb_business_area', $data_area);
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doDeleteArea($id){
        $where = array('business_area' => $id,);

        $this->Crud->d('tb_business_area', $where);
        $this->session->set_flashdata('info', 'Data Business Area Telah Dihapus');
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doUpdateArea($id){
        $where      = array('business_area' => $id);
        $input      = $this->input->post(NULL, TRUE);
        $data_area  = array(
            'nama_business_area'   => $input['business_area'],
        );
        $this->Crud->u('tb_business_area', $data_area, $where);
        $this->session->set_flashdata('info', 'Data Business Area Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function tampilanDaftarPersonnelSubarea()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDaftarPersonnelSubarea',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_subarea' => $this->M_AdministratorInduk->tampilSubarea(),
            'data_area' => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddSubarea() {
        $input        = $this->input->post(NULL, TRUE);
        $data_subarea = array(
            'business_area'            => $input['business_area'],
            'nama_personnel_subarea'   => $input['personnel_subarea'],
        );
        $this->db->set('personnel_subarea', 'UUID()', FALSE);
        $this->db->insert('tb_personnel_area', $data_subarea);
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doDeleteSubarea($id){
        $where = array('personnel_subarea' => $id,);

        $this->Crud->d('tb_personnel_area', $where);
        $this->session->set_flashdata('info', 'Data Personnel Subarea Telah Dihapus');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doUpdateSubarea($id){
        $where      = array('personnel_subarea' => $id);
        $input      = $this->input->post(NULL, TRUE);
        $data_subarea  = array(
            'business_area'            => $input['business_area'],
            'nama_personnel_subarea'   => $input['personnel_subarea'],
        );
        $this->Crud->u('tb_personnel_area', $data_subarea, $where);
        $this->session->set_flashdata('info', 'Data Personnel Subarea Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function tampilanApprovalCommittee()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelApprovalCommittee',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_penerima' => $this->Crud->ga('tb_approval_committee'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddPenerima() {
        $input        = $this->input->post(NULL, TRUE);
        $filenya      = $_FILES['file_ttd']['name'];

        if($filenya = ''){
            redirect('AdministratorInduk/tampilanApprovalCommittee');
        }else{
            
            $config['upload_path'] = './assets/user/approval_committee';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file_ttd')){
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }else{
                $filenya =  $this->upload->data('file_name');
            }

            $data_penerima = array(
                'nip'                       => $input['nipeg'],
                'nama_approval'             => $input['nama_approval'],
                'password'                  => $input['password'],
                'role'                      => 'approval_committee',
                'file_ttd'                  => $filenya,
            );
            $this->db->set('id_approval', 'UUID()', FALSE);
            $this->db->insert('tb_approval_committee', $data_penerima);
            redirect('AdministratorInduk/tampilanApprovalCommittee');
        }
    }

    public function doDeletePenerima($id){
        $where = array('id_approval' => $id,);

        $this->Crud->d('tb_approval_committee', $where);
        $this->session->set_flashdata('info', 'Data Penerima Telah Dihapus');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doUpdatePenerima($id){
        $where         = array('id_approval' => $id);
        $input         = $this->input->post(NULL, TRUE);
        $filenya      = $_FILES['file_ttd']['name'];
        $data_penerima  = array(
            'nip'                       => $input['nipeg'],
            'nama_approval'             => $input['nama_approval'],
            'file_ttd'                  => $filenya,
            
        );
        $this->Crud->u('tb_approval_committee', $data_penerima, $where);
        $this->session->set_flashdata('info', 'Data Penerima Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }
}





