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
        $this->session->set_flashdata('alert_success', 'Data pegawai berhasil ditambahkan!');
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

    public function tampilanNilaiTalentaPegawai(){
        $this->db->select('*');
        $this->db->from('tb_nilai_talenta_pegawai');
        $this->db->order_by('tahun_talenta', 'desc');
        $query = $this->db->get();
        $data_talenta_pegawai = $query->result();

        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelNilaiTalentaPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'tb_talenta' => $data_talenta_pegawai,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }
    public function doAddTalentaPegawai(){
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
            'nip'                  => $input['nip'],
            'nilai_talenta'        => $input['nilai_talenta'],
        );
        $this->db->insert('tb_nilai_talenta_pegawai', $data);
        $this->session->set_flashdata('alert_success', 'Data nilai talenta pegawai berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai');
    }

    public function doUpdateTalentaPegawai($tahun, $semester, $nip){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
            'nip'               => $nip,
        );
        $input      = $this->input->post(NULL, TRUE);
        $data  = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
            'nip'                  => $input['nip'],
            'nilai_talenta'        => $input['nilai_talenta'],
        );
        $this->Crud->u('tb_nilai_talenta_pegawai', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Data nilai talenta pegawai berhasil disunting!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai');
    }

    public function doDeleteTalentaPegawai($tahun, $semester, $nip){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
            'nip'               => $nip,
        );
        $this->Crud->d('tb_nilai_talenta_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data nilai talenta pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai');
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
        $data_penerima = array(
            'nip'                       => $input['nipeg'],
            'password'                  => password_hash($input['password'], PASSWORD_DEFAULT),
            'role'                      => 'approval_committee',
        );
        $this->db->set('id_approval', 'UUID()', FALSE);
        $this->db->insert('tb_approval_committee', $data_penerima);
        $this->session->set_flashdata('alert_success', 'Data penerima berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doDeletePenerima($id){
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_approval' => $id);

        $this->Crud->d('tb_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data penerima berhasil dihapus!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doUpdatePenerima($id){
        $where         = array('id_approval' => $id);
        $input         = $this->input->post(NULL, FALSE);

        if($input['password'] != ''){
            $items = array(
                'nip'                => $input['nipeg'],
                'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
            );
        }else {
            $items = array(
                'nip'                => $input['nipeg'],
            );
        }
        $this->db->update('tb_approval_committee', $items, $where);
        $this->session->set_flashdata('alert_primary', 'Data penerima berhasil disunting!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
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
        $this->session->set_flashdata('alert_success', 'Data posisi berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doDeleteApproval($id){
        $where = array('id_posisi' => $id,);

        $this->Crud->d('tb_posisi_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data posisi berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doUpdateApproval($id){
        $where         = array('id_posisi' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_approval  = array(
            'posisi'                            => $input['posisi'],
        );
        $this->Crud->u('tb_posisi_approval_committee', $data_approval, $where);
        $this->session->set_flashdata('alert_primary', 'Data posisi berhasil disunting!');
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
        $this->session->set_flashdata('alert_success', 'Data talenta berhasil ditambahkan!');
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
        $this->session->set_flashdata('alert_primary', 'Data talenta berhasil disunting!');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }

    public function doDeleteTalenta($id){
        $where = array('id_talenta' => $id,);

        $this->Crud->d('tb_judul_talenta', $where);
        $this->session->set_flashdata('alert_danger', 'Data talenta berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
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
            $this->session->set_flashdata('alert_danger', 'file daftar jabatan gagal diimpor!');
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
            unlink(base_url('/assets/user/administrator_induk/'.$config['file_name']));
            $this->session->set_flashdata('alert_success', 'Daftar sebutan jabatan berhasil diimpor!');
            redirect('AdministratorInduk/tampilanJabatan');

        }
    }

    public function tampilanAdministrator(){
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelAdministrator',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_admin' => $this->M_AdministratorInduk->getDataAdmin(), 
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getPersonnelSubarea(){
        $business_area = $this->input->post('id',TRUE);
        $data = $this->Crud->gw('tb_personnel_area', array('business_area' => $business_area));
        echo json_encode($data);
    }

    public function doAddAdmin() {
        $input      = $this->input->post(NULL, TRUE);
        $data_admin = array(
            'nip'                            => $input['nip'],
            'password'                       => $input['password'],
            'role'                           => $input['status'],
            'personnel_subarea'              => $input['personnel_subarea'],
        );
        $this->db->set('id_administrator', 'UUID()', FALSE);
        $this->db->insert('tb_administrator', $data_admin);
        $this->session->set_flashdata('alert_success', 'Data Administrator Telah Ditambahkan');
        redirect('AdministratorInduk/tampilanAdministrator');
    }

    public function getEditAdmin($id_admin){
        $where = array('id_administrator' => $id_admin);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editAdministrator',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_admin'       => $this->Crud->gw('tb_administrator', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
        );
        $get_data = $this->M_AdministratorInduk->getAdminById($id_admin);
        if($get_data->num_rows() > 0){
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditAdmin(){
        $id_administrator = $this->input->post('id_administrator',TRUE);
        $data = $this->M_AdministratorInduk->getAdminById($id_administrator)->result();
        echo json_encode($data);
    }

    public function doUpdateAdmin(){
        $id            = $this->input->post('id_administrator',TRUE);
        $where         = array('id_administrator' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_admin    = array(
            'nip'                            => $input['nip'],
            'password'                       => $input['password'],
            'role'                           => $input['status'],
            'personnel_subarea'              => $input['personnel_subarea'],
        );
        $this->Crud->u('tb_administrator', $data_admin, $where);
        $this->session->set_flashdata('alert_primary', 'Data Administrator Berhasil Diupdate');
        redirect('AdministratorInduk/tampilanAdministrator');
    }

    public function doDeleteAdmin($id){
        $where = array('id_administrator' => $id,);

        $this->Crud->d('tb_administrator', $where);
        $this->session->set_flashdata('alert_danger', 'Data Administrator Telah Dihapus');
        redirect('AdministratorInduk/tampilanAdministrator');
    }

}