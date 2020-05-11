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
    
    public function index() {
        $data = array(
            'isi' => 'user/contents/testing',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }


# ************ Begin Menu Data Pegawai ******************
    public function tampilanDataPegawai() {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDataPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_pegawai' => $this->M_AdministratorInduk->getDataPegawai(),
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getPersonnelSubarea(){
        $business_area = $this->input->post('id',TRUE);
        $data = $this->Crud->gw('tb_personnel_area', array('business_area' => $business_area));
        echo json_encode($data);
    }

    public function getSebutanJabatan(){
        $personnel_subarea = $this->input->post('id',TRUE);
        $data = $this->Crud->gwo('tb_jabatan', array('personnel_subarea' => $personnel_subarea), 'urutan_dalam_org'); 
        echo json_encode($data);
    }

    public function doAddPegawai() {
        $input        = $this->input->post(NULL, TRUE);
        $data_pegawai = array(
            'pers_no'                        => $input['pers_no'],
            'nip'                            => $input['nipeg'],
            'nama_pegawai'                   => $input['nama_pegawai'],
            'id_sebutan_jabatan'             => $input['sebutan_jabatan'],
            'org_unit'                       => $input['org_unit'],
            'organizational_unit'            => $input['organizational_unit'],
            'position'                       => $input['position'],
            'nama_panjang_posisi'            => $input['nama_panjang_posisi'],
            'jenjang_main_grp'               => $input['jenjang_main_grp'],
            'jenjang_sub_grp'                => $input['jenjang_sub_grp'],
            'grade'                          => $input['grade'],
            'tgl_grade'                      => $input['tgl_grade'],
            'pendidikan_terakhir'            => $input['pendidikan_terakhir'],
            'tgl_lahir'                      => $input['tanggal_lahir'],
            'tgl_capeg'                      => $input['tanggal_capeg'],
            'tgl_pegawai_tetap'              => $input['tanggal_pegawai_tetap'],
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

    public function getEditPegawai($id_pegawai){
        $where = array('nip' => $id_pegawai);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editDataPegawai',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_pegawai'     => $this->Crud->gw('tb_pegawai',$where),
            'area'             => $this->Crud->ga('tb_business_area'),
        );
        $get_data = $this->M_AdministratorInduk->getPegawaiById($id_pegawai);
        if($get_data->num_rows() > 0){
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
            $data['jabatan_id'] = $row['id_sebutan_jabatan'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditPegawai(){
        $id_pegawai = $this->input->post('nip',TRUE);
        $data = $this->M_AdministratorInduk->getPegawaiById($id_pegawai)->result();
        echo json_encode($data);
    }

    public function doUpdatePegawai($id){
        $where         = array('nip' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_pegawai  = array(
            'pers_no'                        => $input['pers_no'],
            'nip'                            => $input['nipeg'],
            'nama_pegawai'                   => $input['nama_pegawai'],
            'id_sebutan_jabatan'             => $input['sebutan_jabatan'],
            'org_unit'                       => $input['org_unit'],
            'organizational_unit'            => $input['organizational_unit'],
            'position'                       => $input['position'],
            'nama_panjang_posisi'            => $input['nama_panjang_posisi'],
            'jenjang_main_grp'               => $input['jenjang_main_grp'],
            'jenjang_sub_grp'                => $input['jenjang_sub_grp'],
            'grade'                          => $input['grade'],
            'tgl_grade'                      => $input['tgl_grade'],
            'pendidikan_terakhir'            => $input['pendidikan_terakhir'],
            'tgl_lahir'                      => $input['tanggal_lahir'],
            'tgl_capeg'                      => $input['tanggal_capeg'],
            'tgl_pegawai_tetap'              => $input['tanggal_pegawai_tetap'],
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

    public function doDeletePegawai($id){
        $where = array('nip' => $id,);

        $this->Crud->d('tb_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doImportPegawai(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        $fileName = $_FILES['file_data_pegawai']['name'];
         
        $config['upload_path'] = './assets/user/administrator_induk';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_data_pegawai')) {
            $this->session->set_flashdata('alert_danger', 'File data pegawai gagal diimpor!');
            redirect('AdministratorInduk/tampilanDataPegawai');
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

                $tgl_grade          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][11]));
                $tgl_lahir          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][13]));
                $tgl_capeg          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][14]));     
                $tgl_pegawai_tetap  = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][15]));
                $tgl_masuk          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][18]));

                $data = array(
                    "pers_no"               => $rowData[0][0],
                    "nip"                   => $rowData[0][1],
                    "nama_pegawai"          => $rowData[0][2],
                    "id_sebutan_jabatan"    => $rowData[0][3],
                    "org_unit"              => $rowData[0][4],
                    "organizational_unit"   => $rowData[0][5],
                    "position"              => $rowData[0][6],
                    "nama_panjang_posisi"   => $rowData[0][7],
                    "jenjang_main_grp"      => $rowData[0][8],
                    "jenjang_sub_grp"       => $rowData[0][9],
                    "grade"                 => $rowData[0][10],
                    "tgl_grade"             => $tgl_grade,
                    "pendidikan_terakhir"   => $rowData[0][12],
                    "tgl_lahir"             => $tgl_lahir,
                    "tgl_capeg"             => $tgl_capeg,
                    "tgl_pegawai_tetap"     => $tgl_pegawai_tetap,
                    "gender"                => $rowData[0][16],
                    "email"                 => $rowData[0][17],
                    "tgl_masuk"             => $tgl_masuk,
                    "agama"                 => $rowData[0][19],
                    "no_telp"               => $rowData[0][20],
                );
                $this->db->insert("tb_pegawai",$data);
            }
            unlink('./assets/user/administrator_induk/'.$fileName);
            $this->session->set_flashdata('alert_success', 'Data pegawai berhasil diimpor!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        }
    }
# ************ End Menu Data Pegawai ******************

# ************ Begin Menu Nilai Talenta Pegawai ******************
    public function tampilanDaftarTalenta(){
        $this->db->select('*');
        $this->db->from('tb_daftar_talenta_per_semester');
        $this->db->order_by('tahun_talenta', 'desc');
        $query = $this->db->get();
        $data_daftar_talenta = $query->result();

        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDaftarTalenta',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'daftar_talenta' => $data_daftar_talenta,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddDaftarTalenta(){
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
        );
        $this->db->insert('tb_daftar_talenta_per_semester', $data);
        $this->session->set_flashdata('alert_success', 'Data semester berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function doDeleteDaftarTalenta($tahun, $semester){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );
        $this->Crud->d('tb_daftar_talenta_per_semester', $where);
        $this->session->set_flashdata('alert_danger', 'Data semester berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function doUpdateDaftarTalenta($tahun, $semester){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );

        $input = $this->input->post(NULL, TRUE);
        $data  = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
        );
        $this->Crud->u('tb_daftar_talenta_per_semester', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Data semester berhasil disunting!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function tampilanNilaiTalentaPegawai($tahun, $semester){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );

        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelNilaiTalentaPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'tb_talenta' => $this->Crud->gw('tb_nilai_talenta_pegawai', $where),
            'judul_tahun' => $tahun,
            'judul_semester' => $semester,
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
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/'.$input['tahun'].'/'.$input['semester']);
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
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/'.$input['tahun'].'/'.$input['semester']);
    }

    public function doDeleteTalentaPegawai($tahun, $semester, $nip){
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
            'nip'               => $nip,
        );
        $this->Crud->d('tb_nilai_talenta_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data nilai talenta pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/'.$tahun.'/'.$semester);
    }

    public function doImportTalentaPegawai(){
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));

        $fileName = $_FILES['file_nilai_talenta_pegawai']['name'];
         
        $config['upload_path'] = './assets/user/administrator_induk';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;
         
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_nilai_talenta_pegawai')) {
            $this->session->set_flashdata('alert_danger', 'File nilai talenta pegawai gagal diimpor!');
            redirect('AdministratorInduk/tampilanDaftarTalenta');
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
                    "nip"                   => $rowData[0][0],
                    "tahun_talenta"         => $rowData[0][1],
                    "semester_talenta"      => $rowData[0][2],
                    "nilai_talenta"         => $rowData[0][3],
                );
                $this->db->insert("tb_nilai_talenta_pegawai",$data);
            }
            unlink('./assets/user/administrator_induk/'.$fileName);
            $this->session->set_flashdata('alert_success', 'Nilai talenta pegawai berhasil diimpor!');

            $baris = 2;
            $barisData = $sheet->rangeToArray('A'.$baris.':'.$highestColumn.$baris, NULL, TRUE, FALSE);
            $urisTahun = $barisData[0][1];
            $urisSemester = $barisData[0][2];
            redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/'.$urisTahun.'/'.$urisSemester);
        }
    }
# ************ End Menu Nilai Talenta Pegawai ******************

# ************ Begin Menu Bussiness Area ******************
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
# ************ End Menu Bussiness Area ******************

# ************ Begin Menu Personnel Subarea ******************
    public function tampilanDaftarPersonnelSubarea()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDaftarPersonnelSubarea',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_subarea' => $this->M_AdministratorInduk->getDataSubarea(),
            'area' => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddSubarea() {
        $input        = $this->input->post(NULL, TRUE);
        $str          = $this->input->post('personnel_subarea',TRUE);
        $id_subarea   = str_replace(" ", "-", $str);
        $data_subarea = array(
            'business_area'            => $input['business_area'],
            'personnel_subarea'        => $id_subarea,
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
        $str        = $this->input->post('personnel_subarea',TRUE);
        $id_subarea = str_replace(" ", "-", $str);
        $data_subarea  = array(
            'business_area'            => $input['business_area'],
            'personnel_subarea'        => $id_subarea,
            'nama_personnel_subarea'   => $input['personnel_subarea'],
        );
        $this->Crud->u('tb_personnel_area', $data_subarea, $where);
        $this->session->set_flashdata('alert_primary', 'Data personnel subarea berhasil disunting!');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }
# ************ Begin Menu Personnel Subarea ******************

# ************ Begin Menu Approval Committee ******************
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
            'nip'        => $input['nipeg'],
            'password'   => password_hash($input['password'], PASSWORD_DEFAULT),
        );
        }else {
            $items = array(
                'nip'    => $input['nipeg'],
            );
        }

        $this->db->update('tb_approval_committee', $items, $where);
        $this->session->set_flashdata('alert_primary', 'Data penerima berhasil disunting!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }
# ************ End Menu Approval Committee ******************

# ************ Begin Menu Posisi Approval Committee ******************
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
    # ************ End Menu Posisi Approval Committee ******************

    # ************ Begin Menu Judul Talenta ******************
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
        $where = array('id_talenta' => $id);

        $this->Crud->d('tb_judul_talenta', $where);
        $this->session->set_flashdata('alert_danger', 'Data talenta berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }
# ************ End Menu Judul Talenta ******************

# ************ Begin Menu Jabatan ******************
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
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddJabatan(){
        $input        = $this->input->post(NULL, TRUE);
        $data_jabatan = array(
            'id_sebutan_jabatan'          => $input['personnel_subarea'].'-'.$input['urutan'],
            'personnel_subarea'           => $input['personnel_subarea'],
            'urutan_dalam_org'            => $input['urutan'],
            'sebutan_jabatan'             => $input['jabatan']
        );
        $this->db->insert('tb_jabatan', $data_jabatan);
        $this->session->set_flashdata('alert_success', 'Data jabatan berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanJabatan');
    }

    public function getEditJabatan($id_jabatan){
        $where = array('id_sebutan_jabatan' => $id_jabatan);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editDataJabatan',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_jabatan'     => $this->Crud->gw('tb_jabatan', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
        );
        $get_data = $this->M_AdministratorInduk->getJabatanById($id_jabatan);
        if($get_data->num_rows() > 0){
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditJabatan(){
        $id_sebutan_jabatan = $this->input->post('id_sebutan_jabatan',TRUE);
        $data = $this->M_AdministratorInduk->getJabatanById($id_sebutan_jabatan)->result();
        echo json_encode($data);
    }

    public function doUpdateJabatan(){
        $id           = $this->input->post('id_sebutan_jabatan',TRUE);
        $where        = array('id_sebutan_jabatan' => $id,);
        $input        = $this->input->post(NULL, TRUE);
        $data_jabatan = array(
            'personnel_subarea'           => $input['personnel_subarea'],
            'urutan_dalam_org'            => $input['urutan'],
            'sebutan_jabatan'             => $input['jabatan'],
        );          
        $this->Crud->u('tb_jabatan', $data_jabatan, $where);
        $this->session->set_flashdata('alert_primary', 'Data jabatan berhasil disunting!');
        redirect('AdministratorInduk/tampilanJabatan');
    }

    public function doDeleteJabatan($id){
        $where = array('id_sebutan_jabatan' => $id);

        $this->Crud->d('tb_jabatan', $where);
        $this->session->set_flashdata('alert_danger', 'Data jabatan berhasil dihapus!');
        redirect('AdministratorInduk/tampilanJabatan');
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
            unlink('./assets/user/administrator_induk/'.$fileName);
            $this->session->set_flashdata('alert_success', 'Daftar sebutan jabatan berhasil diimpor!');
            redirect('AdministratorInduk/tampilanJabatan');
        }
    }
# ************ End Menu Jabatan ******************

# ************ Begin Menu Pengaturan Administrator ******************
    public function tampilanAdministrator(){
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelAdministrator',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_admin' => $this->M_AdministratorInduk->getDataAdmin(), 
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddAdmin() {
        $input      = $this->input->post(NULL, TRUE);
        $data_admin = array(
            'nip'                            => $input['nip'],
            'password'                       => password_hash($input['password'], PASSWORD_DEFAULT),
            'role'                           => $input['status'],
            'personnel_subarea'              => $input['personnel_subarea'],
        );
        $this->db->set('id_administrator', 'UUID()', FALSE);
        $this->db->insert('tb_administrator', $data_admin);
        $this->session->set_flashdata('alert_success', 'Data Administrator Telah Ditambahkan!');
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
        $id     = $this->input->post('id_administrator',TRUE);
        $where  = array('id_administrator' => $id,);
        $input  = $this->input->post(NULL, TRUE);

        if($input['password'] != ''){
                $data_admin = array(
                    'nip'                => $input['nip'],
                    'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
                    'role'               => $input['status'],
                    'personnel_subarea'  => $input['personnel_subarea'],
                );
            }else {
                $data_admin = array(
                    'nip'                => $input['nip'],
                    'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
                    'role'               => $input['status'],
                    'personnel_subarea'  => $input['personnel_subarea'],
                );
            }
            
        $this->Crud->u('tb_administrator', $data_admin, $where);
        $this->session->set_flashdata('alert_primary', 'Data administrator berhasil disunting!');
        redirect('AdministratorInduk/tampilanAdministrator');
    }

    public function doDeleteAdmin($id){
        $where = array('id_administrator' => $id,);

        $this->Crud->d('tb_administrator', $where);
        $this->session->set_flashdata('alert_danger', 'Data administrator berhasil dihapus!');
        redirect('AdministratorInduk/tampilanAdministrator');
    }
# ************ End Menu Pengaturan Administrator ******************

# ************ Begin Menu Lembar Evaluasi ******************
    public function tampilanUsulanLembarEvaluasi(){
        $where = array('status_usulan' => 'diterima');

        $data = array(
            'isi'         => 'user/contents/administrator_induk/tabelUsulanLembarEvaluasi',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_diterima' => $this->Crud->gw('tb_usulan_evaluasi', $where), 
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanAddUsulanLembarEvaluasi(){
        $data = array(
            'isi'         => 'user/contents/administrator_induk/addUsulanLembarEvaluasi',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'area'        => $this->Crud->ga('tb_business_area'),
            'posisi'      => $this->Crud->ga('tb_posisi_approval_committee'),
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function autoFillUsulanPegawai(){
        $id_pegawai = $this->input->post('nip',FALSE);
        $dataPeg = $this->M_AdministratorInduk->getPegawaiById($id_pegawai)->result();
        echo json_encode($dataPeg);
    }
# ************ End Menu Lembar Evaluasi ******************

}