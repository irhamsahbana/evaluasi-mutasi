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
        $this->session->set_flashdata('alert_success', 'Data pegawai baru berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doDeletePegawai($id){
        $where = array('nip' => $id,);

        $this->Crud->d('tb_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data pegawai berhasil dihapus!');
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
        $this->session->set_flashdata('alert_primary', 'Data pegawai berhasil disunting!');
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
            'business_area'        => $input['id_business_area'],
            'nama_business_area'   => $input['business_area'],
        );
        $this->db->insert('tb_business_area', $data_area);
        $this->session->set_flashdata('alert_success', 'Data business area baru berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doDeleteArea($id){
        $where = array('business_area' => $id,);

        $this->Crud->d('tb_business_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data business area berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doUpdateArea($id){
        $where      = array('business_area' => $id);
        $input      = $this->input->post(NULL, TRUE);
        $data_area  = array(
            'business_area'        => $input['id_business_area'],
            'nama_business_area'   => $input['business_area'],
        );
        $this->Crud->u('tb_business_area', $data_area, $where);
        $this->session->set_flashdata('alert_primary', 'Data business area berhasil disunting!');
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
            'personnel_subarea'        => $input['id_personnel_subarea'],
            'nama_personnel_subarea'   => $input['personnel_subarea'],
        );
        $this->db->insert('tb_personnel_area', $data_subarea);
        $this->session->set_flashdata('alert_success', 'Data personnel subarea berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doDeleteSubarea($id){
        $where = array('personnel_subarea' => $id,);

        $this->Crud->d('tb_personnel_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data personnel subarea berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doUpdateSubarea($id){
        $where      = array('personnel_subarea' => $id);
        $input      = $this->input->post(NULL, TRUE);
        $data_subarea  = array(
            'business_area'            => $input['business_area'],
            'personnel_subarea'        => $input['id_personnel_subarea'],
            'nama_personnel_subarea'   => $input['personnel_subarea'],
        );
        $this->Crud->u('tb_personnel_area', $data_subarea, $where);
        $this->session->set_flashdata('alert_primary', 'Data personnel subarea berhasil disunting!');
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
            $this->session->set_flashdata('alert_success', 'Data penerima berhasil ditambahkan!');
            redirect('AdministratorInduk/tampilanApprovalCommittee');
        }
    }

    public function doDeletePenerima($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_approval' => $id);
        unlink('./assets/user/approval_committee/'.$input['file_ttd']);


        $this->Crud->d('tb_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data penerima berhasil dihapus!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doUpdatePenerima($id){
        $where         = array('id_approval' => $id);
        $input         = $this->input->post(NULL, FALSE);

        if(!empty($_FILES['file_ttd']['tmp_name'])){

            $filenya = $_FILES['file_ttd']['name'];

            if($filenya = ''){
                $this->session->set_flashdata('alert_danger', 'Gagal merubah Data!');
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }else {
                $config['upload_path'] = './assets/user/approval_committee';
                $config['allowed_types'] = 'png';
                $config['max_size'] = '' ;
                
                $this->load->library('upload', $config);
                if($config['max_size'] >= 2048){
                    $this->session->set_flashdata('alert_danger', 'File Melewati Batas Ukuran!');
                    redirect('AdministratorInduk/tampilanApprovalCommittee');
                }
                unlink($config['upload_path'].'/'.$input['foto_lama']);

                if (!$this->upload->do_upload('file_ttd')){
                    $this->session->set_flashdata('alert_danger', 'Gagal mengupload! Periksa kembali ukuran dan ekstensi file!');
                    redirect('AdministratorInduk/tampilanApprovalCommittee');
                }else{
                    $filenya = $this->upload->data();
                }

                $items = array(
                    'nip'                       => $input['nipeg'],
                    'nama_approval'             => $input['nama_approval'],
                    'file_ttd'                  => $filenya['file_name'],
                );

                $this->db->update('tb_approval_committee', $items, $where);
                $this->session->set_flashdata('alert_primary', 'Data penerima berhasil disunting!');
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }  
        }else{
            $items = array(
                'nip'                       => $input['nipeg'],
                'nama_approval'             => $input['nama_approval'],
            );

            $this->db->update('tb_approval_committee', $items, $where);
            $this->session->set_flashdata('alert_primary', 'Data penerima berhasil disunting!');
            redirect('AdministratorInduk/tampilanApprovalCommittee');
        }
    }

    public function tampilanDataApproval()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelPosisiApproval',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_approval' => $this->Crud->ga('tb_posisi_approval_committee'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }
     public function doAddApproval() {
        $input        = $this->input->post(NULL, TRUE);
        $data_approval = array(
            'posisi'                            => $input['posisi'],
        );
        $this->db->set('id_posisi', 'UUID()', FALSE);
        $this->db->insert('tb_posisi_approval_committee', $data_approval);
        $this->session->set_flashdata('alert_success', 'Data Posisi Telah ditambahkan');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doDeleteApproval($id){
        $where = array('id_posisi' => $id,);

        $this->Crud->d('tb_posisi_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data Posisi Telah Dihapus');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doUpdateApproval($id){
        $where         = array('id_posisi' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_approval  = array(
            'posisi'                            => $input['posisi'],
        );
        $this->Crud->u('tb_posisi_approval_committee', $data_approval, $where);
        $this->session->set_flashdata('alert_primary', 'Data Posisi Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanDataApproval');
    }
}





