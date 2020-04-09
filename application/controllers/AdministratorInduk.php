<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdministratorInduk extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if($this->session->userdata('status') != "login"){
            redirect('login');
        }
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
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
            // 'subarea' => $this->M_AdministratorInduk->getSubareaRows(),
            // 'jabatan' => $this->M_AdministratorInduk->getJabatanRows(),
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

    public function getJabatan() {
        $jabatan = array();
        $personnel_subarea = $this->input->post('personnel_subarea');
        if($personnel_subarea) {
            $con['conditions'] = array('personnel_subarea'=>$personnel_subarea);
            $jabatan = $this->M_AdministratorInduk->getJabatanRows($con);
        }
        echo json_encode($jabatan);
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
        $this->session->set_flashdata('alert_primary', 'Data pegawai baru berhasil disunting!');
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
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doDeleteArea($id){
        $where = array('business_area' => $id,);

        $this->Crud->d('tb_business_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data Business Area Telah Dihapus');
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
        $this->session->set_flashdata('alert_primary', 'Data Business Area Berhasil Diupdate');
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
        $this->session->set_flashdata('alert_success', 'Data Personnel Subarea Telah Ditambahkan');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doDeleteSubarea($id){
        $where = array('personnel_subarea' => $id,);

        $this->Crud->d('tb_personnel_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data Personnel Subarea Telah Dihapus');
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
        $this->session->set_flashdata('alert_primary', 'Data Personnel Subarea Berhasil Diupdate');
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
            $this->session->set_flashdata('alert_danger', 'file tanda tangan tidak boleh kosong!');
            redirect('AdministratorInduk/tampilanApprovalCommittee');
        }else{
            
            $config['upload_path'] = './assets/user/approval_committee';
            $config['allowed_types'] = 'png';
            $config['max_size'] = '' ;
                
            $this->load->library('upload', $config);
            if($config['max_size'] >= 2048){
                $this->session->set_flashdata('alert_danger', 'Gagal mengupload! Periksa kembali ukuran dan ekstensi file!');
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file_ttd')){
                $this->session->set_flashdata('alert_danger', 'Gagal mengupload! Periksa kembali ukuran dan ekstensi file!');
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }else{
                $filenya =  $this->upload->data('file_name');
            }

            $data_penerima = array(
                'nip'                       => $input['nipeg'],
                'nama_approval'             => $input['nama_approval'],
                'password'                  => password_hash($input['password'], PASSWORD_DEFAULT),
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
                    $this->session->set_flashdata('alert_danger', 'Gagal mengupload! Periksa kembali ukuran dan ekstensi file!');
                    redirect('AdministratorInduk/tampilanApprovalCommittee');
                }
                unlink($config['upload_path'].'/'.$input['foto_lama']);

                if (!$this->upload->do_upload('file_ttd')){
                    $this->session->set_flashdata('alert_danger', 'Gagal mengupload! Periksa kembali ukuran dan ekstensi file!');
                    redirect('AdministratorInduk/tampilanApprovalCommittee');
                }else{
                    $filenya = $this->upload->data();
                }

                if($input['password'] != ''){
                    $items = array(
                        'nip'                => $input['nipeg'],
                        'nama_approval'      => $input['nama_approval'],
                        'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
                        'file_ttd'           => $filenya['file_name'],
                    );
                }else {
                    $items = array(
                        'nip'                => $input['nipeg'],
                        'nama_approval'      => $input['nama_approval'],
                        'file_ttd'           => $filenya['file_name'],
                    );
                }

                $this->db->update('tb_approval_committee', $items, $where);
                $this->session->set_flashdata('alert_primary', 'Data penerima berhasil disunting!');
                redirect('AdministratorInduk/tampilanApprovalCommittee');
            }  
        }else{
            if($input['password'] != ''){
                $items = array(
                    'nip'                => $input['nipeg'],
                    'nama_approval'      => $input['nama_approval'],
                    'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
                );
            }else {
                $items = array(
                    'nip'                => $input['nipeg'],
                    'nama_approval'      => $input['nama_approval'],
                );
            }

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

    public function tampilanNilaiTalenta()
    {
        $data = array(
            'isi' => 'user/contents/tabelNilaiTalenta',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_talenta' => $this->Crud->ga('tb_judul_talenta'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

     public function doAddTalenta() {
        $input        = $this->input->post(NULL, TRUE);
        $data_talenta = array(
            'id_talenta'                           => $input['id_talenta'],
            'tahun'                            => $input['tahun'],
            'semester'                         => $input['semester'],
        );
        $this->db->insert('tb_judul_talenta', $data_talenta);
        $this->session->set_flashdata('alert_success', 'Data Talenta Telah ditambahkan');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }

    public function doUpdateTalenta($id){
        $where         = array('id_talenta' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_talenta  = array(
            'id_talenta'                       => $input['id_talenta'],
            'tahun'                            => $input['tahun'],
            'semester'                         => $input['semester'],
        );
        $this->Crud->u('tb_judul_talenta', $data_talenta, $where);
        $this->session->set_flashdata('alert_primary', 'Data Talenta Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }

    public function doDeleteTalenta($id){
        $where = array('id_talenta' => $id,);

        $this->Crud->d('tb_judul_talenta', $where);
        $this->session->set_flashdata('alert_danger', 'Data Talenta Telah Dihapus');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }

    public function tampilanAdministrator(){
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelAdministrator',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_admin' => $this->Crud->ga('tb_administrator'),
            'business_area' => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanJabatan(){
        $this->db->select('*');
        $this->db->from('tb_jabatan');
        $this->db->order_by('personnel_subarea', 'asc');
        $this->db->order_by('urutan_dalam_org', 'asc');
        $query = $this->db->get();
        $data_jabatan = $query->result();
        

        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDaftarJabatan',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_jabatan' => $data_jabatan,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doImportJabatan(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        $fileName = $_FILES['file_jabatan']['name'];
         
        $config['upload_path'] = './assets/user/administrator_induk';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_jabatan')) {
            $this->session->set_flashdata('alert_danger', 'file daftar jabatan gagal di import!');
            redirect('AdministratorInduk/tampilanJabatan');
        } else {
           $media = $this->upload->data();
           $inputFileName = './assets/user/administrator_induk/'.$media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }

           $sheet = $objPHPExcel->getSheet(0);
           $highestRow = $sheet->getHighestRow();
           $highestColumn = $sheet->getHighestColumn();

           for ($row = 2; $row <= $highestRow; $row++){  
                $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                   NULL,
                   TRUE,
                   FALSE);
                $data = array(
                    "id_sebutan_jabatan" => $rowData[0][2].'-'.$rowData[0][0],
                    "urutan_dalam_org"=> $rowData[0][0],
                    "sebutan_jabatan"=> $rowData[0][1],
                    "Personnel_subarea"=> $rowData[0][2],
                );
                $this->db->insert("tb_jabatan",$data);
            }
            unlink('./assets/user/administrator_induk/'.$config['file_name']);
            $this->session->set_flashdata('alert_success', 'Daftar sebutan jabatan berhasil di import!');
            redirect('AdministratorInduk/tampilanJabatan');

        }
    }
}