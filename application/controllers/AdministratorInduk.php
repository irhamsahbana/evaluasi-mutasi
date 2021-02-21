<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class AdministratorInduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');

        if ($this->session->userdata('status') != 'login') {
            redirect('Login');
        } else {
            if ($this->session->userdata('role') != 'admin_induk') {

                if ($this->session->userdata('role') == 'admin_unit'){
                    redirect('AdministratorUnit');
                }else {
                    redirect('ApprovalCommittee');
                }
            }
        }
    }

    public function index()
    {
        $data = array(
            'isi'   => 'user/contents/administrator_induk/dashboard',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'jml_pegawai' => $this->Crud->ca('tb_pegawai'),
            'jml_admin' => $this->Crud->ca('tb_administrator'),
            'jml_approval' => $this->Crud->ca('tb_approval_committee'),
            'jml_usulan_unit_pending' => $this->Crud->cw('tb_usulan_evaluasi', array('status_usulan' => 'dipending')),
            'terakhir_tambah' => $this->Crud->gw('tb_dashboard', array('id_dashboard' => 'tambah_massal_data_pegawai')),
            'terakhir_sunting' => $this->Crud->gw('tb_dashboard', array('id_dashboard' => 'sunting_massal_data_pegawai')),
            // 'waktu_sekarang' => date(),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

# ************ Begin Menu Data Pegawai ******************
    public function tampilanDataPegawai()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDataPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_pegawai' => $this->M_AdministratorInduk->getDataPegawai(),
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
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

    public function doAddPegawai()
    {
        $input        = $this->input->post(NULL, TRUE);
        $data_pegawai = array(
            'pers_no'                        => trim($input['pers_no']),
            'nip'                            => trim($input['nipeg']),
            'nama_pegawai'                   => trim($input['nama_pegawai']),
            'id_sebutan_jabatan'             => trim($input['sebutan_jabatan']),
            'org_unit'                       => trim($input['org_unit']),
            'organizational_unit'            => trim($input['organizational_unit']),
            'position'                       => trim($input['position']),
            'nama_panjang_posisi'            => trim($input['nama_panjang_posisi']),
            'jenjang_main_grp'               => trim($input['jenjang_main_grp']),
            'jenjang_sub_grp'                => trim($input['jenjang_sub_grp']),
            'grade'                          => trim($input['grade']),
            'tgl_grade'                      => trim($input['tgl_grade']),
            'pendidikan_terakhir'            => trim($input['pendidikan_terakhir']),
            'tgl_lahir'                      => trim($input['tanggal_lahir']),
            'tgl_capeg'                      => trim($input['tanggal_capeg']),
            'tgl_pegawai_tetap'              => trim($input['tanggal_pegawai_tetap']),
            'gender'                         => trim($input['gender']),
            'email'                          => trim($input['email']),
            'tgl_masuk'                      => trim($input['tanggal_masuk']),
            'agama'                          => trim($input['religious']),
            'no_telp'                        => trim($input['telephone_no']),
        );

        $cek = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$input[nipeg]'");
        if($cek->num_rows() > 0) { 
            $this->session->set_flashdata("alert_danger", "Data pegawai dengan NIP tersebut telah ada!");
        } else {
            $this->db->insert('tb_pegawai', $data_pegawai);
            $this->session->set_flashdata('alert_success', 'Data pegawai berhasil ditambahkan!');
        }
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function getEditPegawai($id_pegawai)
    {
        $where = array('nip' => $id_pegawai);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editDataPegawai',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_pegawai'     => $this->Crud->gw('tb_pegawai', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
        );
        $get_data = $this->M_AdministratorInduk->getPegawaiById($id_pegawai);
        if ($get_data->num_rows() > 0) {
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
            $data['jabatan_id'] = $row['id_sebutan_jabatan'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditPegawai()
    {
        $id_pegawai = $this->input->post('nip', TRUE);
        $data = $this->M_AdministratorInduk->getPegawaiById($id_pegawai)->result();
        echo json_encode($data);
    }

    public function doUpdatePegawai($id)
    {
        $where         = array('nip' => $id,);
        $input         = $this->input->post(NULL, TRUE);
        $data_pegawai  = array(
            'pers_no'                        => trim($input['pers_no']),
            'nip'                            => trim($input['nipeg']),
            'nama_pegawai'                   => trim($input['nama_pegawai']),
            'id_sebutan_jabatan'             => trim($input['sebutan_jabatan']),
            'org_unit'                       => trim($input['org_unit']),
            'organizational_unit'            => trim($input['organizational_unit']),
            'position'                       => trim($input['position']),
            'nama_panjang_posisi'            => trim($input['nama_panjang_posisi']),
            'jenjang_main_grp'               => trim($input['jenjang_main_grp']),
            'jenjang_sub_grp'                => trim($input['jenjang_sub_grp']),
            'grade'                          => trim($input['grade']),
            'tgl_grade'                      => trim($input['tgl_grade']),
            'pendidikan_terakhir'            => trim($input['pendidikan_terakhir']),
            'tgl_lahir'                      => trim($input['tanggal_lahir']),
            'tgl_capeg'                      => trim($input['tanggal_capeg']),
            'tgl_pegawai_tetap'              => trim($input['tanggal_pegawai_tetap']),
            'gender'                         => trim($input['gender']),
            'email'                          => trim($input['email']),
            'tgl_masuk'                      => trim($input['tanggal_masuk']),
            'agama'                          => trim($input['religious']),
            'no_telp'                        => trim($input['telephone_no']),
        );
        $this->Crud->u('tb_pegawai', $data_pegawai, $where);
        $this->session->set_flashdata('alert_primary', 'Data pegawai berhasil disunting!');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doDeletePegawai($id)
    {
        $where = array('nip' => $id,);

        $this->Crud->d('tb_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doImportPegawaiNew()
    {
        if($_FILES['file_data_pegawai']['name'] != '') {
            $allowed_extension = array('xls', 'csv', 'xlsx');
            $file_array = explode(".", $_FILES["file_data_pegawai"]["name"]);
            $file_extension = end($file_array);

            if(in_array($file_extension, $allowed_extension)) {
                $file_name = time() . '.' . $file_extension;
                move_uploaded_file($_FILES['file_data_pegawai']['tmp_name'], $file_name);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                $spreadsheet = $reader->load($file_name);
                unlink($file_name);
                $rowData = $spreadsheet->getActiveSheet()->toArray();

                $berhasil = 0;
                $pegawai_sudah_ada = 0;
                $cell_kosong = 0;
                $nip_sudah_ada = array();

                for($i = 1;$i < count($rowData);$i++){
                    //Variabel pendek
                        $tgl_grade          = date('Y-m-d', strtotime(trim($rowData[$i][11])));
                        $tgl_lahir          = date('Y-m-d', strtotime(trim($rowData[$i][13])));
                        $tgl_capeg          = date('Y-m-d', strtotime(trim($rowData[$i][14])));
                        $tgl_pegawai_tetap  = date('Y-m-d', strtotime(trim($rowData[$i][15])));
                        $tgl_masuk          = date('Y-m-d', strtotime(trim($rowData[$i][18])));

                        $pers_no               = trim(strtoupper($rowData[$i][0]));
                        $nip                   = trim(strtoupper($rowData[$i][1]));
                        $nama_pegawai          = trim(strtoupper($rowData[$i][2]));
                        $id_sebutan_jabatan    = trim(strtoupper($rowData[$i][3]));
                        $org_unit              = trim(strtoupper($rowData[$i][4]));
                        $organizational_unit   = trim(strtoupper($rowData[$i][5]));
                        $position              = trim(strtoupper($rowData[$i][6]));
                        $nama_panjang_posisi   = trim(strtoupper($rowData[$i][7]));
                        $jenjang_main_grp      = trim(strtoupper($rowData[$i][8]));
                        $jenjang_sub_grp       = trim(strtoupper($rowData[$i][9]));
                        $grade                 = trim(strtoupper($rowData[$i][10]));
                        $tgl_grade             = trim($tgl_grade);
                        $pendidikan_terakhir   = trim(strtoupper($rowData[$i][12]));
                        $tgl_lahir             = trim($tgl_lahir);
                        $tgl_capeg             = trim($tgl_capeg);
                        $tgl_pegawai_tetap     = trim($tgl_pegawai_tetap);
                        $gender                = trim(strtoupper($rowData[$i][16]));
                        $email                 = trim(strtoupper($rowData[$i][17]));
                        $tgl_masuk             = trim($tgl_masuk);
                        $agama                 = trim(strtoupper($rowData[$i][19]));
                        $no_telp               = trim(strtoupper($rowData[$i][20]));
                    //variabel pendek

                    $cek_pegawai = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip'");

                    if( empty($pers_no) || empty($nip) || empty($nama_pegawai) || empty($id_sebutan_jabatan) || empty($org_unit) || empty($organizational_unit) || empty($position) || empty($nama_panjang_posisi) || empty($jenjang_main_grp) || empty($jenjang_sub_grp) || empty($grade) || empty($tgl_grade) || empty($pendidikan_terakhir) || empty($tgl_lahir) || empty($tgl_capeg) || empty($tgl_pegawai_tetap) || empty($gender) || empty($email) || empty($tgl_masuk) || empty($agama) || empty($no_telp) ){
                        $cell_kosong++;
                    } else {
                        if($cek_pegawai->num_rows() > 0) { 
                            $pegawai_sudah_ada++;
                            array_push($nip_sudah_ada, $nip);
                        } else {
                            $data = array(
                                "pers_no"               => $pers_no,
                                "nip"                   => $nip,
                                "nama_pegawai"          => $nama_pegawai,
                                "id_sebutan_jabatan"    => $id_sebutan_jabatan,
                                "org_unit"              => $org_unit,
                                "organizational_unit"   => $organizational_unit,
                                "position"              => $position,
                                "nama_panjang_posisi"   => $nama_panjang_posisi,
                                "jenjang_main_grp"      => $jenjang_main_grp,
                                "jenjang_sub_grp"       => $jenjang_sub_grp,
                                "grade"                 => $grade,
                                "tgl_grade"             => $tgl_grade,
                                "pendidikan_terakhir"   => $pendidikan_terakhir,
                                "tgl_lahir"             => $tgl_lahir,
                                "tgl_capeg"             => $tgl_capeg,
                                "tgl_pegawai_tetap"     => $tgl_pegawai_tetap,
                                "gender"                => $gender,
                                "email"                 => $email,
                                "tgl_masuk"             => $tgl_masuk,
                                "agama"                 => $agama,
                                "no_telp"               => $no_telp,
                            );
                            $this->db->insert("tb_pegawai", $data);
                            $berhasil++;
                        }
                    }
                }

                $daftar_nip_sa = '';
                foreach ($nip_sudah_ada as $nsa) {
                    $daftar_nip_sa .= $nsa . '<br>';
                }

                $this->session->set_flashdata('alert_success', 'Data pegawai berhasil diimpor!'.' ('. 'Cell kosong = '.$cell_kosong.', data pegawai berhasil diimpor = '.$berhasil.', pegawai telah ada di database = '.$pegawai_sudah_ada.')'
                    .'<br>'
                    .'NIP yang sudah ada di data pegawai :<br>'
                    .$daftar_nip_sa);
                // $this->Crud->u('tb_dashboard', array());
                $this->Crud->u('tb_dashboard', array('terakhir' => date("Y-m-d H:i:s")) ,array('id_dashboard' =>'tambah_massal_data_pegawai'));
                redirect('AdministratorInduk/tampilanDataPegawai');

                
            } else{
                $this->session->set_flashdata('alert_danger', 'Hanya Boleh File berekstensi .xlsx .xls atau .csv!');
                redirect('AdministratorInduk/tampilanDataPegawai');
            }
        } else {
            $this->session->set_flashdata('alert_danger', 'Tidak dapat menemukan File!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        } 
    }

    public function doImportUpdatePegawaiNew()
    {
        if($_FILES['file_sunting_data_pegawai']['name'] != '') {
            $allowed_extension = array('xls', 'csv', 'xlsx');
            $file_array = explode(".", $_FILES["file_sunting_data_pegawai"]["name"]);
            $file_extension = end($file_array);

            if(in_array($file_extension, $allowed_extension)) {
                $file_name = time() . '.' . $file_extension;
                move_uploaded_file($_FILES['file_sunting_data_pegawai']['tmp_name'], $file_name);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                $spreadsheet = $reader->load($file_name);
                unlink($file_name);
                $rowData = $spreadsheet->getActiveSheet()->toArray();

                $berhasil = 0;
                $pegawai_tidak_ada = 0;
                $cell_kosong = 0;
                $nip_tidak_ada = array();
                
                for($i = 1;$i < count($rowData);$i++){
                    //Variabel pendek
                        $tgl_grade          = date('Y-m-d', strtotime(trim($rowData[$i][11])));
                        $tgl_lahir          = date('Y-m-d', strtotime(trim($rowData[$i][13])));
                        $tgl_capeg          = date('Y-m-d', strtotime(trim($rowData[$i][14])));
                        $tgl_pegawai_tetap  = date('Y-m-d', strtotime(trim($rowData[$i][15])));
                        $tgl_masuk          = date('Y-m-d', strtotime(trim($rowData[$i][18])));

                        $pers_no               = trim(strtoupper($rowData[$i][0]));
                        $nip                   = trim(strtoupper($rowData[$i][1]));
                        $nama_pegawai          = trim(strtoupper($rowData[$i][2]));
                        $id_sebutan_jabatan    = trim(strtoupper($rowData[$i][3]));
                        $org_unit              = trim(strtoupper($rowData[$i][4]));
                        $organizational_unit   = trim(strtoupper($rowData[$i][5]));
                        $position              = trim(strtoupper($rowData[$i][6]));
                        $nama_panjang_posisi   = trim(strtoupper($rowData[$i][7]));
                        $jenjang_main_grp      = trim(strtoupper($rowData[$i][8]));
                        $jenjang_sub_grp       = trim(strtoupper($rowData[$i][9]));
                        $grade                 = trim(strtoupper($rowData[$i][10]));
                        $tgl_grade             = trim($tgl_grade);
                        $pendidikan_terakhir   = trim(strtoupper($rowData[$i][12]));
                        $tgl_lahir             = trim($tgl_lahir);
                        $tgl_capeg             = trim($tgl_capeg);
                        $tgl_pegawai_tetap     = trim($tgl_pegawai_tetap);
                        $gender                = trim(strtoupper($rowData[$i][16]));
                        $email                 = trim(strtoupper($rowData[$i][17]));
                        $tgl_masuk             = trim($tgl_masuk);
                        $agama                 = trim(strtoupper($rowData[$i][19]));
                        $no_telp               = trim(strtoupper($rowData[$i][20]));
                    //variabel pendek

                    $cek_pegawai = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip'");

                    if( empty($pers_no) || empty($nip) || empty($nama_pegawai) || empty($id_sebutan_jabatan) || empty($org_unit) || empty($organizational_unit) || empty($position) || empty($nama_panjang_posisi) || empty($jenjang_main_grp) || empty($jenjang_sub_grp) || empty($grade) || empty($tgl_grade) || empty($pendidikan_terakhir) || empty($tgl_lahir) || empty($tgl_capeg) || empty($tgl_pegawai_tetap) || empty($gender) || empty($email) || empty($tgl_masuk) || empty($agama) || empty($no_telp) ){
                        $cell_kosong++;
                    } else{
                        if($cek_pegawai->num_rows() == 0) { 
                            $pegawai_tidak_ada++;
                            array_push($nip_tidak_ada, $nip);
                        } else{
                            $data_pegawai = array(
                                "pers_no"               => $pers_no,
                                "nip"                   => $nip,
                                "nama_pegawai"          => $nama_pegawai,
                                "id_sebutan_jabatan"    => $id_sebutan_jabatan,
                                "org_unit"              => $org_unit,
                                "organizational_unit"   => $organizational_unit,
                                "position"              => $position,
                                "nama_panjang_posisi"   => $nama_panjang_posisi,
                                "jenjang_main_grp"      => $jenjang_main_grp,
                                "jenjang_sub_grp"       => $jenjang_sub_grp,
                                "grade"                 => $grade,
                                "tgl_grade"             => $tgl_grade,
                                "pendidikan_terakhir"   => $pendidikan_terakhir,
                                "tgl_lahir"             => $tgl_lahir,
                                "tgl_capeg"             => $tgl_capeg,
                                "tgl_pegawai_tetap"     => $tgl_pegawai_tetap,
                                "gender"                => $gender,
                                "email"                 => $email,
                                "tgl_masuk"             => $tgl_masuk,
                                "agama"                 => $agama,
                                "no_telp"               => $no_telp,
                            );
                            $where = array('nip' => $nip);
                            $this->Crud->u("tb_pegawai", $data_pegawai, $where);  
                            $berhasil++;             
                        }
                    }
                }

                $daftar_nip_ta = '';
                foreach ($nip_tidak_ada as $nta) {
                    $daftar_nip_ta .= $nta . '<br>';
                }
                $this->session->set_flashdata('alert_success', 'Data pegawai berhasil disunting!'.' ('. 'Cell kosong = '.$cell_kosong.', data pegawai berhasil disunting = '.$berhasil.', pegawai tidak ada di database = '.$pegawai_tidak_ada.')'
                    .'<br>'
                    .'NIP yang tidak ada di data pegawai :<br>'
                    .$daftar_nip_ta);
                $this->Crud->u('tb_dashboard', array('terakhir' => date("Y-m-d H:i:s")), array('id_dashboard' => 'sunting_massal_data_pegawai'));
                redirect('AdministratorInduk/tampilanDataPegawai');
            } else{
                $this->session->set_flashdata('alert_danger', 'Hanya Boleh File berekstensi .xlsx .xls atau .csv!');
                redirect('AdministratorInduk/tampilanDataPegawai');
            }
        } else {
            $this->session->set_flashdata('alert_danger', 'Tidak dapat menemukan File!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        }
    }

    public function doExportDataPegawai()
    {
        $data['data_pegawai'] = $this->Crud->ga('tb_pegawai');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
        $spreadsheet->getDefaultStyle()->getFont()->setSize(10);

        //Begin Styling
            $sheet->getStyle('A1:U1')->getFont()->setBold(true);

            $sheet->getColumnDimension('A')->setWidth(9.57);
            $sheet->getColumnDimension('B')->setWidth(8.71);
            $sheet->getColumnDimension('C')->setWidth(20.57);
            $sheet->getColumnDimension('D')->setWidth(25.71);
            $sheet->getColumnDimension('E')->setWidth(17.71);
            $sheet->getColumnDimension('F')->setWidth(35.86);
            $sheet->getColumnDimension('G')->setWidth(10.43);
            $sheet->getColumnDimension('H')->setWidth(60);
            $sheet->getColumnDimension('I')->setWidth(21.71);
            $sheet->getColumnDimension('J')->setWidth(23.71);
            $sheet->getColumnDimension('K')->setWidth(10.71);
            $sheet->getColumnDimension('L')->setWidth(14.86);
            $sheet->getColumnDimension('M')->setWidth(23.29);
            $sheet->getColumnDimension('N')->setWidth(12.14);
            $sheet->getColumnDimension('O')->setWidth(17);
            $sheet->getColumnDimension('P')->setWidth(24);
            $sheet->getColumnDimension('Q')->setWidth(12.71);
            $sheet->getColumnDimension('R')->setWidth(29.29);
            $sheet->getColumnDimension('S')->setWidth(15);
            $sheet->getColumnDimension('T')->setWidth(28.57);
            $sheet->getColumnDimension('U')->setWidth(15.86);
        //End Styling

        $sheet->setCellValue('A1', 'Pers.No.');
        $sheet->setCellValue('B1', 'Nipeg');
        $sheet->setCellValue('C1', 'Personnel Number');
        $sheet->setCellValue('D1', 'ID Jabatan');
        $sheet->setCellValue('E1', 'Org.unit');
        $sheet->setCellValue('F1', 'Organizational Unit');
        $sheet->setCellValue('G1', 'Position');
        $sheet->setCellValue('H1', 'Nama Panjang Posisi');
        $sheet->setCellValue('I1', 'Jenjang - Main Grp Text');
        $sheet->setCellValue('J1', 'Jenjang - Sub Grp Text');
        $sheet->setCellValue('K1', 'PS group');
        $sheet->setCellValue('L1', 'Tanggal Grade Terakhir');
        $sheet->setCellValue('M1', 'Pendidikan Terakhir');
        $sheet->setCellValue('N1', 'Birth date');
        $sheet->setCellValue('O1', 'Tanggal CAPEG');
        $sheet->setCellValue('P1', 'Tanggal Pegawai Tetap');
        $sheet->setCellValue('Q1', 'Gender Key');
        $sheet->setCellValue('R1', 'E-mail');
        $sheet->setCellValue('S1', 'Tanggal Masuk');
        $sheet->setCellValue('T1', 'Religious Denomination Key');
        $sheet->setCellValue('U1', 'Telephone no.');

        $baris = 2;
        foreach($data['data_pegawai'] as $f) {
            $sheet->setCellValue('A'.$baris, $f->pers_no);
            $sheet->setCellValue('B'.$baris, $f->nip);
            $sheet->setCellValue('C'.$baris, $f->nama_pegawai);
            $sheet->setCellValue('D'.$baris, $f->id_sebutan_jabatan);
            $sheet->setCellValue('E'.$baris, $f->org_unit);
            $sheet->setCellValue('F'.$baris, $f->organizational_unit);
            $sheet->setCellValue('G'.$baris, $f->position);
            $sheet->setCellValue('H'.$baris, $f->nama_panjang_posisi);
            $sheet->setCellValue('I'.$baris, $f->jenjang_main_grp);
            $sheet->setCellValue('J'.$baris, $f->jenjang_sub_grp);
            $sheet->setCellValue('K'.$baris, $f->grade);
            $sheet->setCellValue('L'.$baris, date('d/m/Y', strtotime($f->tgl_grade)));
            $sheet->setCellValue('M'.$baris, $f->pendidikan_terakhir);
            $sheet->setCellValue('N'.$baris, date('d/m/Y', strtotime($f->tgl_lahir)));
            $sheet->setCellValue('O'.$baris, date('d/m/Y', strtotime($f->tgl_capeg)));
            $sheet->setCellValue('P'.$baris, date('d/m/Y', strtotime($f->tgl_pegawai_tetap)));
            $sheet->setCellValue('Q'.$baris, $f->gender);
            $sheet->setCellValue('R'.$baris, $f->email);
            $sheet->setCellValue('S'.$baris, date('d/m/Y', strtotime($f->tgl_masuk)));
            $sheet->setCellValue('T'.$baris, $f->agama);
            $sheet->setCellValue('U'.$baris, $f->no_telp);

            $baris++;
        }

        $filename = 'Data_Pegawai_(Sistem_Evaluasi_Mutasi)_-_';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        die;
    }
# ************ End Menu Data Pegawai ******************

# ************ Begin Menu Nilai Talenta Pegawai ******************
    public function tampilanDaftarTalenta()
    {
        $this->db->select('*');
        $this->db->from('tb_daftar_talenta_per_semester');
        $this->db->order_by('tahun_talenta', 'desc');
        $query = $this->db->get();
        $data_daftar_talenta = $query->result();

        $data = array(
            'isi'               => 'user/contents/administrator_induk/tabelDaftarTalenta',
            'title'             => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'daftar_talenta'    => $data_daftar_talenta,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanNilaiTalentaPegawai($tahun, $semester)
    {
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );

        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelNilaiTalentaPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'tb_talenta' => $this->M_AdministratorInduk->nilaiTalentaPegawai($where),
            'judul_tahun' => $tahun,
            'judul_semester' => $semester,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddDaftarTalenta()
    {
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => trim($input['tahun']),
            'semester_talenta'     => trim($input['semester']),
        );
        $this->db->insert('tb_daftar_talenta_per_semester', $data);
        $this->session->set_flashdata('alert_success', 'Data semester berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function doDeleteDaftarTalenta($tahun, $semester)
    {
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );
        $this->Crud->d('tb_daftar_talenta_per_semester', $where);
        $this->Crud->d('tb_nilai_talenta_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data semester berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function doUpdateDaftarTalenta($tahun, $semester)
    {
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
        );

        $input = $this->input->post(NULL, TRUE);
        $data  = array(
            'tahun_talenta'        => trim($input['tahun']),
            'semester_talenta'     => trim($input['semester']),
        );
        $this->Crud->u('tb_daftar_talenta_per_semester', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Data semester berhasil disunting!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
    }

    public function doAddTalentaPegawai()
    {
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => trim($input['tahun']),
            'semester_talenta'     => trim($input['semester']),
            'nip'                  => trim($input['nip']),
            'nilai_talenta'        => trim($input['nilai_talenta']),
        );
        $this->db->insert('tb_nilai_talenta_pegawai', $data);
        $this->session->set_flashdata('alert_success', 'Data nilai talenta pegawai berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $input['tahun'] . '/' . $input['semester']);
    }

    public function doUpdateTalentaPegawai($tahun, $semester, $nip)
    {
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
            'nip'               => $nip,
        );

        $input      = $this->input->post(NULL, TRUE);
        $data  = array(
            'tahun_talenta'        => trim($input['tahun']),
            'semester_talenta'     => trim($input['semester']),
            'nip'                  => trim($input['nip']),
            'nilai_talenta'        => trim($input['nilai_talenta']),
        );
        $this->Crud->u('tb_nilai_talenta_pegawai', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Data nilai talenta pegawai berhasil disunting!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $input['tahun'] . '/' . $input['semester']);
    }

    public function doDeleteTalentaPegawai($tahun, $semester, $nip)
    {
        $where      = array(
            'tahun_talenta'     => $tahun,
            'semester_talenta'  => $semester,
            'nip'               => $nip,
        );
        $this->Crud->d('tb_nilai_talenta_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data nilai talenta pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $tahun . '/' . $semester);
    }

    public function doImportTalentaPegawaiNew()
    {
        if($_FILES['file_nilai_talenta_pegawai']['name'] != '') {
            $allowed_extension = array('xls', 'csv', 'xlsx');
            $file_array = explode(".", $_FILES["file_nilai_talenta_pegawai"]["name"]);
            $file_extension = end($file_array);

            if(in_array($file_extension, $allowed_extension)) {
                $file_name = time() . '.' . $file_extension;
                move_uploaded_file($_FILES['file_nilai_talenta_pegawai']['tmp_name'], $file_name);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                $spreadsheet = $reader->load($file_name);
                unlink($file_name);
                $rowData = $spreadsheet->getActiveSheet()->toArray();

                $pegawai_tidak_ada = 0;
                $cell_kosong = 0;
                $nilai_ada = 0;
                $berhasil = 0;
                $nip_tidak_ada = array();
                $nip_sudah_ada = array();

                for($i = 1;$i < count($rowData);$i++){
                    $nip                = trim($rowData[$i][0]);
                    $tahun_talenta      = trim($rowData[$i][1]);
                    $semester_talenta   = trim($rowData[$i][2]);
                    $nilai_talenta      = trim($rowData[$i][3]);

                    $cek_pegawai = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip'");
                    $cek_talenta = $this->db->query("SELECT nip FROM tb_nilai_talenta_pegawai WHERE nip = '$nip' AND tahun_talenta = '$tahun_talenta' AND semester_talenta = '$semester_talenta'");

                    if ((!empty($nip)) && (!empty($tahun_talenta)) && (!empty($semester_talenta)) && (!empty($nilai_talenta)) ){
                        if($cek_pegawai->num_rows() == 0) { 
                            $pegawai_tidak_ada++;
                            array_push($nip_tidak_ada, $nip);
                        } else {
                            if($cek_talenta->num_rows() > 0){
                                $nilai_ada++;
                                array_push($nip_sudah_ada, $nip);
                            } else {
                                $data = array(
                                    "nip"                   => $nip,
                                    "tahun_talenta"         => $tahun_talenta,
                                    "semester_talenta"      => $semester_talenta,
                                    "nilai_talenta"         => $nilai_talenta,
                                );
                                $this->db->insert("tb_nilai_talenta_pegawai", $data);
                                $berhasil++;
                            }
                        }
                    } else {
                        $cell_kosong++;
                    }
                }

                $daftar_nip_ta = '';
                foreach ($nip_tidak_ada as $npa) {
                    $daftar_nip_ta .= $npa . '<br>';
                }

                $daftar_nip_sa = '';
                foreach ($nip_sudah_ada as $nsa) {
                    $daftar_nip_sa .= $nsa . '<br>';
                }

                $this->session->set_flashdata('alert_success', 'Nilai talenta pegawai berhasil diimpor!'.' ('. 'Cell kosong = '.$cell_kosong.', pegawai tidak ada di database = '.$pegawai_tidak_ada.', nilai talenta telah ada = '.$nilai_ada.', nilai talenta berhasil diimpor = '.$berhasil.')'
                    .'<br>'
                    .'NIP yang tidak ada di data pegawai :<br>'
                    .$daftar_nip_ta
                    .'NIP sudah memiliki nilai talenta :<br>'
                    .$daftar_nip_sa);

                $urisTahun = $rowData[1][1];
                $urisSemester = $rowData[1][2];
                redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $urisTahun . '/' . $urisSemester);
            } else{
                $this->session->set_flashdata('alert_danger', 'Hanya Boleh File berekstensi .xlsx .xls atau .csv!');
                redirect('AdministratorInduk/tampilanDaftarTalenta');
            }
        } else {
            $this->session->set_flashdata('alert_danger', 'Tidak dapat menemukan File!');
            redirect('AdministratorInduk/tampilanDaftarTalenta');
        } 
    }
# ************ End Menu Nilai Talenta Pegawai ******************

# ************ Begin Menu Bussiness Area ******************
    public function tampilanDaftarBusinessArea()
    {
        $data = array(
            'isi'       => 'user/contents/administrator_induk/tabelDaftarBusinessArea',
            'title'     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_area' => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddArea()
    {
        $input     = $this->input->post(NULL, TRUE);
        $data_area = array(
            'business_area'        => $input['id_business_area'],
            'nama_business_area'   => $input['business_area'],
        );
        $this->db->insert('tb_business_area', $data_area);
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doDeleteArea($id)
    {
        $where = array('business_area' => $id,);

        $this->Crud->d('tb_business_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data business area berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarBusinessArea');
    }

    public function doUpdateArea($id)
    {
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
            'isi'           => 'user/contents/administrator_induk/tabelDaftarPersonnelSubarea',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_subarea'  => $this->M_AdministratorInduk->getDataSubarea(),
            'area'          => $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddSubarea()
    {
        $input        = $this->input->post(NULL, TRUE);
        $str          = $this->input->post('personnel_subarea', TRUE);
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

    public function doDeleteSubarea($id)
    {
        $where = array('personnel_subarea' => $id,);

        $this->Crud->d('tb_personnel_area', $where);
        $this->session->set_flashdata('alert_danger', 'Data personnel subarea berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDaftarPersonnelSubarea');
    }

    public function doUpdateSubarea($id)
    {
        $where      = array('personnel_subarea' => $id);
        $input      = $this->input->post(NULL, TRUE);
        $str        = $this->input->post('personnel_subarea', TRUE);
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
            'isi'           => 'user/contents/administrator_induk/tabelApprovalCommittee',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_penerima' => $this->M_AdministratorInduk->getDataApproval(),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddPenerima()
    {
        $input        = $this->input->post(NULL, TRUE);

        $data_penerima = array(
            'nip'                       => trim($input['nipeg']),
            'password'                  => password_hash(trim($input['password']), PASSWORD_DEFAULT),
            'role'                      => 'approval_committee',
        );

        $nip_trim = trim($input['nipeg']);
        $cek = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip_trim'");
        $cek_approval = $this->db->query("SELECT nip FROM tb_approval_committee WHERE nip = '$nip_trim'");

        if($cek->num_rows() == 0) { 
            $this->session->set_flashdata("alert_danger", "Tambahkan dulu Data pegawai dengan NIP tersebut di database pegawai!");
        } else {
            if($cek_approval->num_rows() > 0) {
                $this->session->set_flashdata("alert_danger", "Approval Committee dengan NIP tersebut telah ada!");
            } else {
                $this->db->set('id_approval', 'UUID()', FALSE);
                $this->db->insert('tb_approval_committee', $data_penerima);
                $this->session->set_flashdata('alert_success', 'Data penerima berhasil ditambahkan!');
            }
        }
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doDeletePenerima($id)
    {
        $input = $this->input->post(NULL, TRUE);
        $where = array('id_approval' => $id);

        $this->Crud->d('tb_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data penerima berhasil dihapus!');
        redirect('AdministratorInduk/tampilanApprovalCommittee');
    }

    public function doUpdatePenerima($id)
    {
        $where         = array('id_approval' => $id);
        $input         = $this->input->post(NULL, TRUE);

        if ($input['password'] != '') {
            $items = array(
                'nip'        => trim($input['nipeg']),
                'password'   => password_hash(trim($input['password']), PASSWORD_DEFAULT),
            );
        } else {
            $items = array(
                'nip'        => trim($input['nipeg'])
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
            'isi'           => 'user/contents/administrator_induk/tabelPosisiApproval',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_approval' => $this->Crud->ga('tb_posisi_approval_committee'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }
    public function doAddApproval()
    {
        $input          = $this->input->post(NULL, TRUE);
        $data_approval = array(
            'posisi'   => $input['posisi'],
        );
        $this->db->set('id_posisi', 'UUID()', FALSE);
        $this->db->insert('tb_posisi_approval_committee', $data_approval);
        $this->session->set_flashdata('alert_success', 'Data posisi berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doDeleteApproval($id)
    {
        $where = array('id_posisi' => $id,);

        $this->Crud->d('tb_posisi_approval_committee', $where);
        $this->session->set_flashdata('alert_danger', 'Data posisi berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDataApproval');
    }

    public function doUpdateApproval($id)
    {
        $where          = array('id_posisi' => $id,);
        $input          = $this->input->post(NULL, TRUE);
        $data_approval  = array(
            'posisi'  => $input['posisi'],
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
            'isi'           => 'user/contents/tabelNilaiTalenta',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_talenta'  => $this->Crud->ga('tb_judul_talenta'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddTalenta()
    {
        $input        = $this->input->post(NULL, TRUE);
        $data_talenta = array(
            'id_talenta'                       => $input['id_talenta'],
            'tahun'                            => $input['tahun'],
            'semester'                         => $input['semester'],
        );
        $this->db->insert('tb_judul_talenta', $data_talenta);
        $this->session->set_flashdata('alert_success', 'Data talenta berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }

    public function doUpdateTalenta($id)
    {
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

    public function doDeleteTalenta($id)
    {
        $where = array('id_talenta' => $id);

        $this->Crud->d('tb_judul_talenta', $where);
        $this->session->set_flashdata('alert_danger', 'Data talenta berhasil dihapus!');
        redirect('AdministratorInduk/tampilanNilaiTalenta');
    }
# ************ End Menu Judul Talenta ******************

# ************ Begin Menu Jabatan ******************
    public function tampilanJabatanPerUnit()
    {
        $data = array(
            'isi'           => 'user/contents/administrator_induk/tabelDaftarPersonnelSubareaJabatan',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_subarea'  => $this->M_AdministratorInduk->getDataSubarea(),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doEmptyJabatan($ps)
    {
        $where = array('personnel_subarea' => $ps);
        $this->Crud->d('tb_jabatan', $where);
        $this->session->set_flashdata('alert_danger', 'Data jabatan '.$ps.' berhasil dikosongkan!');
        redirect('AdministratorInduk/tampilanJabatanPerUnit/');
    }

    public function tampilanJabatan($personnel_subarea)
    {
        $this->db->select('*');
        $this->db->from('tb_jabatan');
        $this->db->order_by('personnel_subarea', 'asc');
        $this->db->order_by('urutan_dalam_org', 'asc');
        $this->db->where('personnel_subarea', $personnel_subarea);
        $query = $this->db->get();
        $data_jabatan = $query->result();

        $where_ps = array('personnel_subarea' => $personnel_subarea);

        $data = array(
            'isi'           => 'user/contents/administrator_induk/tabelDaftarJabatan',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_jabatan'  => $data_jabatan,
            'area'          => $this->Crud->ga('tb_business_area'),
            'ps'            => $personnel_subarea,
            'nama_ps'       => $this->Crud->gw('tb_personnel_area', $where_ps)
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddJabatan($ps)
    {
        $input        = $this->input->post(NULL, TRUE);
        $data_jabatan = array(
            'id_sebutan_jabatan'          => $input['personnel_subarea'] . '-' . $input['urutan'],
            'personnel_subarea'           => $input['personnel_subarea'],
            'urutan_dalam_org'            => $input['urutan'],
            'sebutan_jabatan'             => $input['jabatan']
        );
        $this->db->insert('tb_jabatan', $data_jabatan);
        $this->session->set_flashdata('alert_success', 'Data jabatan berhasil ditambahkan!');
        redirect('AdministratorInduk/tampilanJabatan/'.$ps);
    }

    public function getEditJabatan($id_jabatan, $ps)
    {
        $where = array('id_sebutan_jabatan' => $id_jabatan);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editDataJabatan',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_jabatan'     => $this->Crud->gw('tb_jabatan', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
            'ps'               => $ps
        );
        $get_data = $this->M_AdministratorInduk->getJabatanById($id_jabatan);
        if ($get_data->num_rows() > 0) {
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditJabatan()
    {
        $id_sebutan_jabatan = $this->input->post('id_sebutan_jabatan', TRUE);
        $data = $this->M_AdministratorInduk->getJabatanById($id_sebutan_jabatan)->result();
        echo json_encode($data);
    }

    public function doUpdateJabatan($ps)
    {
        $id           = $this->input->post('id_sebutan_jabatan', TRUE);
        $where        = array('id_sebutan_jabatan' => $id,);
        $input        = $this->input->post(NULL, TRUE);
        $data_jabatan = array(
            'personnel_subarea'           => $input['personnel_subarea'],
            'urutan_dalam_org'            => $input['urutan'],
            'sebutan_jabatan'             => $input['jabatan'],
        );
        $this->Crud->u('tb_jabatan', $data_jabatan, $where);
        $this->session->set_flashdata('alert_primary', 'Data jabatan berhasil disunting!');
        redirect('AdministratorInduk/tampilanJabatan/'.$ps);
    }

    public function doDeleteJabatan($id, $ps)
    {
        $where = array('id_sebutan_jabatan' => $id);

        $this->Crud->d('tb_jabatan', $where);
        $this->session->set_flashdata('alert_danger', 'Data jabatan berhasil dihapus!');
        redirect('AdministratorInduk/tampilanJabatan/'.$ps);
    }

    public function doImportJabatanNew($ps)
    {
        if($_FILES['file_jabatan']['name'] != '') {
            $allowed_extension = array('xls', 'csv', 'xlsx');
            $file_array = explode(".", $_FILES["file_jabatan"]["name"]);
            $file_extension = end($file_array);

            if(in_array($file_extension, $allowed_extension)) {
                $file_name = time() . '.' . $file_extension;
                move_uploaded_file($_FILES['file_jabatan']['tmp_name'], $file_name);
                $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                $spreadsheet = $reader->load($file_name);
                unlink($file_name);
                $rowData = $spreadsheet->getActiveSheet()->toArray();

                $id_jabatan_ada = 0;
                $cell_kosong = 0;
                $berhasil = 0;
                $id_sebutan_jabatan_ada = 0;
                $id_jabatan_sudah_ada = array();

                for($i = 1;$i < count($rowData);$i++){
                    //variabel pendek
                        $id_sebutan_jabatan    = trim($rowData[$i][2]) . '-' . trim($rowData[$i][0]);
                        $urutan_dalam_org      = trim($rowData[$i][0]);
                        $sebutan_jabatan       = trim($rowData[$i][1]);
                        $Personnel_subarea     = trim($rowData[$i][2]);
                    //variabal pendek

                    $cek_jabatan = $this->db->query("SELECT id_sebutan_jabatan FROM tb_jabatan WHERE id_sebutan_jabatan = '$id_sebutan_jabatan'");

                    if( empty($urutan_dalam_org) || empty($sebutan_jabatan) || empty($Personnel_subarea) ){
                        $cell_kosong++;
                    }else {
                        if($cek_jabatan->num_rows() > 0){
                            $id_sebutan_jabatan_ada++;
                            array_push($id_jabatan_sudah_ada, $id_sebutan_jabatan);
                        } else {
                            $data = array(
                                "id_sebutan_jabatan" => $id_sebutan_jabatan,
                                "urutan_dalam_org" => $urutan_dalam_org,
                                "sebutan_jabatan" => $sebutan_jabatan,
                                "Personnel_subarea" => $Personnel_subarea,
                            );
                            $this->db->insert("tb_jabatan", $data);
                            $berhasil++;
                        }
                    }
                }

                $daftar_id_sa = '';
                foreach ($id_jabatan_sudah_ada as $isa) {
                    $daftar_id_sa .= $isa . '<br>';
                }

                $this->session->set_flashdata('alert_success', 'Data sebutan jabatan berhasil diimpor!'.' ('. 'Cell kosong = '.$cell_kosong.', data sebutan jabatan berhasil diimpor = '.$berhasil.', id sebutan jabatan telah ada di database = '.$id_jabatan_ada.')'
                    .'<br>'
                    .'Id sebutan jabatan yang sudah ada di database :<br>'
                    .$daftar_id_sa);

                redirect('AdministratorInduk/tampilanJabatan/'.$ps);
            } else{
                $this->session->set_flashdata('alert_danger', 'Hanya Boleh File berekstensi .xlsx .xls atau .csv!');
                redirect('AdministratorInduk/tampilanJabatan/'.$ps);
            }
        } else {
            $this->session->set_flashdata('alert_danger', 'Tidak dapat menemukan File!');
            redirect('AdministratorInduk/tampilanJabatan/'.$ps);
        } 
    }
# ************ End Menu Jabatan ******************

# ************ Begin Menu Pengaturan Administrator ******************
    public function tampilanAdministrator()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelAdministrator',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_admin' => $this->M_AdministratorInduk->getDataAdmin(),
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddAdmin()
    {
        $input      = $this->input->post(NULL, TRUE);
        $data_admin = array(
            'nip'                            => trim($input['nip']),
            'password'                       => password_hash(trim($input['password']), PASSWORD_DEFAULT),
            'role'                           => trim($input['status']),
            'personnel_subarea'              => trim($input['personnel_subarea']),
        );

        $nip_trim = trim($input['nip']);
        $cek = $this->db->query("SELECT nip FROM tb_pegawai WHERE nip = '$nip_trim'");
        $cek_admin = $this->db->query("SELECT nip FROM tb_administrator WHERE nip = '$nip_trim'");
        if($cek->num_rows() == 0) { 
            $this->session->set_flashdata("alert_danger", "Tambahkan dulu Data pegawai dengan NIP tersebut di database pegawai!");
        } else {
            if($cek_admin->num_rows() > 0) {
                $this->session->set_flashdata("alert_danger", "Administrator dengan NIP tersebut telah ada!");
            } else {
                $this->db->set('id_administrator', 'UUID()', FALSE);
                $this->db->insert('tb_administrator', $data_admin);
                $this->session->set_flashdata('alert_success', 'Data Administrator Telah Ditambahkan!');
            }
        }
        redirect('AdministratorInduk/tampilanAdministrator');
    }

    public function getEditAdmin($id_admin)
    {
        $where = array('id_administrator' => $id_admin);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editAdministrator',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_admin'       => $this->Crud->gw('tb_administrator', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
        );
        $get_data = $this->M_AdministratorInduk->getAdminById($id_admin);
        if ($get_data->num_rows() > 0) {
            $row = $get_data->row_array();
            $data['subarea_id'] = $row['personnel_subarea'];
        }
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getDataEditAdmin()
    {
        $id_administrator = $this->input->post('id_administrator', TRUE);
        $data = $this->M_AdministratorInduk->getAdminById($id_administrator)->result();
        echo json_encode($data);
    }

    public function doUpdateAdmin()
    {
        $id     = $this->input->post('id_administrator', TRUE);
        $where  = array('id_administrator' => $id,);
        $input  = $this->input->post(NULL, TRUE);

        if ($input['password'] != '') {
            $data_admin = array(
                'nip'                => trim($input['nip']),
                'password'           => password_hash(trim($input['password']), PASSWORD_DEFAULT),
                'role'               => $input['status'],
                'personnel_subarea'  => $input['personnel_subarea'],
            );
        } else {
            $data_admin = array(
                'nip'                => trim($input['nip']),
                'password'           => password_hash(trim($input['password']), PASSWORD_DEFAULT),
                'role'               => $input['status'],
                'personnel_subarea'  => $input['personnel_subarea'],
            );
        }

        $this->Crud->u('tb_administrator', $data_admin, $where);
        $this->session->set_flashdata('alert_primary', 'Data administrator berhasil disunting!');
        redirect('AdministratorInduk/tampilanAdministrator');
    }

    public function doDeleteAdmin($id)
    {
        $where = array('id_administrator' => $id,);
        $cek = $this->Crud->gw('tb_administrator', $where);
        $count_induk = $this->Crud->cw('tb_administrator', array('role' => 'admin_induk'));

        foreach($cek as $f){
            $role = $f->role;
        }

        if($role == 'admin_induk'){
            if($count_induk ==  1){
                $this->session->set_flashdata('alert_danger', 'Tidak dapat menghapus! minimal ada 1 administrator induk di sistem!');
            }else {
                $this->Crud->d('tb_administrator', $where);
                $this->session->set_flashdata('alert_danger', 'Data administrator berhasil dihapus!');
            }
        }else {
            $this->Crud->d('tb_administrator', $where);
            $this->session->set_flashdata('alert_danger', 'Data administrator berhasil dihapus!');
        }

        redirect('AdministratorInduk/tampilanAdministrator');
    }
# ************ End Menu Pengaturan Administrator ******************

# ************ Begin Menu Lembar Evaluasi ******************
    public function tampilanUsulanLembarEvaluasi()
    {
        $where = array('status_usulan' => 'diterima');

        $data = array(
            'isi'                       => 'user/contents/administrator_induk/tabelUsulanLembarEvaluasi',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_diterima'  => $this->M_AdministratorInduk->usulanLembarEvaluasiDiterima()
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanAddUsulanLembarEvaluasi()
    {
        $data = array(
            'isi'         => 'user/contents/administrator_induk/addUsulanLembarEvaluasi',
            'title'       => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'area'        => $this->Crud->ga('tb_business_area'),
            'approval'    => $this->M_AdministratorInduk->getDataApproval(),
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
        $status_usulan    = 'diterima';
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
        $this->db->trans_start();
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
        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
                $this->session->set_flashdata('alert_danger', 'Data usulan evaluasi mutasi tidak berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('alert_success', 'Data usulan evaluasi mutasi berhasil ditambahkan!');
        }
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

    public function doExportToExcel($id_usulan)
    {
        $where = array('id_usulan' => $id_usulan);

        $data_usulan_pegawai['usulan_pegawai'] = $this->Crud->gw('tb_usulan_evaluasi_pegawai', $where);
        $data['surat'] = $this->Crud->gw('tb_usulan_evaluasi', $where);
        $data['approval'] = $this->M_AdministratorInduk->rincianApprovalUsulan($where);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        //Styling Begin
            $spreadsheet->getActiveSheet()->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
            $spreadsheet->getActiveSheet()->getPageSetup()->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4);
            $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');
            $spreadsheet->getDefaultStyle()->getFont()->setSize(10);

            $sheet->getStyle('B1')->getFont()->setSize(8);
            $sheet->getStyle('B2')->getFont()->setSize(8);
            $sheet->getStyle('J7')->getFont()->setSize(8);
            $sheet->mergeCells('A4:K4');
            $sheet->mergeCells('A5:K5');

            //Header Begin
                $sheet->getStyle('A4:A5')->getFont()->setSize(11)->setBold(true);
                $sheet->getStyle('A4:A5')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A4:A5')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);


                $sheet->getStyle('A7:K9')->getFont()->setBold(true);
                $sheet->getStyle('A7:K9')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('A7:K9')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

                $sheet->mergeCells('A7:A9');
                $sheet->mergeCells('B7:B9');
                $sheet->mergeCells('C7:C9');
                $sheet->mergeCells('D7:D9');
                $sheet->mergeCells('E7:E9');

                $sheet->mergeCells('F7:H7');

                $sheet->mergeCells('F8:F9');
                $sheet->mergeCells('G8:G9');
                $sheet->mergeCells('H8:H9');

                $sheet->mergeCells('I7:I9');
                $sheet->mergeCells('J7:J9');
                $sheet->mergeCells('K7:K9');

                //column's width Begin
                $sheet->getColumnDimension('A')->setWidth(3.5);
                $sheet->getColumnDimension('B')->setWidth(24);
                $sheet->getColumnDimension('C')->setWidth(46);
                $sheet->getColumnDimension('D')->setWidth(11);
                $sheet->getColumnDimension('E')->setWidth(13.5);
                $sheet->getColumnDimension('F')->setWidth(5);
                $sheet->getColumnDimension('G')->setWidth(5);
                $sheet->getColumnDimension('H')->setWidth(5);
                $sheet->getColumnDimension('I')->setWidth(46);
                $sheet->getColumnDimension('J')->setWidth(7.5);
                $sheet->getColumnDimension('K')->setWidth(18);
                //column's width End

                //Header Title Wrap Text Begin
                $sheet->getStyle('D7')->getAlignment()->setWrapText(true);
                $sheet->getStyle('E7')->getAlignment()->setWrapText(true);
                $sheet->getStyle('J7')->getAlignment()->setWrapText(true);

                $sheet->getStyle('F8')->getAlignment()->setWrapText(true);
                $sheet->getStyle('G8')->getAlignment()->setWrapText(true);
                $sheet->getStyle('H8')->getAlignment()->setWrapText(true);
                //Header Title Wrap Text End

                //Border Header Begin
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $sheet->getStyle('A7:K9')->applyFromArray($styleArray);
                //Border Header Begin
            //Header End
        //Styling End

        //Header Begin
            $sheet->setCellValue('B1', 'PT PLN (PERSERO)');
            $sheet->setCellValue('B2', 'WILAYAH SULSELRABAR');
            $sheet->setCellValue('A4', 'LEMBAR EVALUASI MUTASI PEGAWAI');

            foreach($data['surat'] as $no_surat){
                $sheet->setCellValue('A5', 'Nomor : '.$no_surat->no_surat);
            }

            $sheet->setCellValue('A7', 'No');
            $sheet->setCellValue('B7', 'Nama / No.Induk');
            $sheet->setCellValue('C7', 'Sebutan Jabatan / Kelas Unit');
            $sheet->setCellValue('D7', 'Grade / Sejak');
            $sheet->setCellValue('E7', 'Pendidikan Terakhir');

            $sheet->setCellValue('F7', 'Nilai Talenta');
            foreach($data['surat'] as $h){
                $sheet->setCellValue('F8', $h->tahun_1.' ('.$h->semester_1.')');
                $sheet->setCellValue('G8', $h->tahun_2.' ('.$h->semester_2.')');
                $sheet->setCellValue('H8', $h->tahun_3.' ('.$h->semester_3.')');
            }
            $sheet->setCellValue('I7', 'Jabatan Baru / Kelas Unit');
            $sheet->setCellValue('J7', 'Lama di jabatan Terakhir');
            $sheet->setCellValue('K7', 'Ket.');
        //Header End

        //Content Begin
            $no = 1;
            $baris = 10;
            foreach($data_usulan_pegawai['usulan_pegawai'] as $p){
                $baris_bawah = $baris+1;

                $sheet->setCellValue('A'.$baris, $no++);
                $sheet->setCellValue('B'.$baris, $p->nama_usulan);
                $sheet->setCellValue('B'.$baris_bawah, $p->nip_usulan);
                $sheet->setCellValue('C'.$baris, $p->jabatan_skg);
                $sheet->setCellValue('D'.$baris, $p->grade_skg);
                $sheet->setCellValue('D'.$baris_bawah, $p->tgl_grade_skg);
                $sheet->setCellValue('E'.$baris, $p->pendidikan_terakhir);
                $sheet->setCellValue('F'.$baris, $p->n_talenta_1);
                $sheet->setCellValue('G'.$baris, $p->n_talenta_2);
                $sheet->setCellValue('H'.$baris, $p->n_talenta_3);
                $sheet->setCellValue('I'.$baris, $p->jabatan_usulan);
                $sheet->setCellValue('J'.$baris, $p->lama_jabatan_skg);
                $sheet->setCellValue('K'.$baris, $p->keterangan);

                $sheet->mergeCells('A'.$baris.':A'.$baris_bawah);
                $sheet->mergeCells('C'.$baris.':C'.$baris_bawah);
                $sheet->mergeCells('E'.$baris.':E'.$baris_bawah);
                $sheet->mergeCells('F'.$baris.':F'.$baris_bawah);
                $sheet->mergeCells('G'.$baris.':G'.$baris_bawah);
                $sheet->mergeCells('H'.$baris.':H'.$baris_bawah);
                $sheet->mergeCells('I'.$baris.':I'.$baris_bawah);
                $sheet->mergeCells('J'.$baris.':J'.$baris_bawah);
                $sheet->mergeCells('K'.$baris.':K'.$baris_bawah);

                $sheet->getRowDimension($baris_bawah)->setRowHeight(138);
                $sheet->getStyle('B'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('C'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('I'.$baris)->getAlignment()->setWrapText(true);
                $sheet->getStyle('J'.$baris)->getAlignment()->setWrapText(true);

                $sheet->getStyle('A'.$baris.':K'.$baris_bawah)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
                $sheet->getStyle('A'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('D'.$baris.':H'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle('J'.$baris)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                //Border Content Begin
                $styleArray = [
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ];

                $sheet->getStyle('A'.$baris.':K'.$baris_bawah)->applyFromArray($styleArray);
                //Border Content End
                $baris += 2;
            }
        //Content End

        $baris_wkt = $baris+1;
        $baris_tim = $baris+2;
        $baris_apr = $baris+4;
        foreach($data['surat'] as $ket){
            $sheet->setCellValue('A'.$baris_wkt, $ket->lokasi_surat.', '.date_indo($ket->tgl_surat));
            $sheet->setCellValue('A'.$baris_tim, $ket->tim_approval);
        }

        $no_apr = 1;
        foreach($data['approval'] as $apr){
            $titik_ttd = $baris_apr+4;
            $sheet->setCellValue('A'.$baris_apr, $no_apr.'. '.$apr->nama_pegawai.' ('.$apr->posisi.')');
            $sheet->setCellValue('A'.$titik_ttd, '..............................................');
            $no_apr++;
            $baris_apr += 6;
        }


        $filename = 'Lembar_Evaluasi_Mutasi_-_';
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        die;
    }
# ************ End Menu Lembar Evaluasi ******************

# ************ Begin Menu Lembar Evaluasi dari Unit ******************
    public function tampilanUsulanLembarEvaluasiUnit()
    {
        $where = array('status_usulan' => 'dipending');

        $data = array(
            'isi'                       => 'user/contents/administrator_induk/tabelUsulanLembarEvaluasi',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_diterima'  => $this->M_AdministratorInduk->usulanLembarEvaluasiDipending()
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function tampilanUsulanLembarEvaluasiUnitDitolak()
    {
        $where = array('status_usulan' => 'dipending');

        $data = array(
            'isi'                       => 'user/contents/administrator_induk/tabelUsulanLembarEvaluasi',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'lembar_evaluasi_diterima'  => $this->M_AdministratorInduk->usulanLembarEvaluasiDitolak()
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function terimaUsulan($id_usulan)
    {
        $where         = array('id_usulan' => $id_usulan);
        $input         = $this->input->post(NULL, TRUE);
        $data          = array(
            'status_usulan'                => 'diterima'
        );
        $this->Crud->u('tb_usulan_evaluasi', $data, $where);
        $this->session->set_flashdata('alert_success', 'Usulan Evaluasi Mutasi dari Unit Diterima!');
        redirect('AdministratorInduk/tampilanUsulanLembarEvaluasi');
    }

    public function tolakUsulan($id_usulan)
    {
        $where         = array('id_usulan' => $id_usulan);
        $input         = $this->input->post(NULL, TRUE);
        $data          = array(
            'status_usulan'     => 'ditolak',
            'alasan_ditolak'    => $input['alasan_ditolak']

        );
        $this->Crud->u('tb_usulan_evaluasi', $data, $where);
        $this->session->set_flashdata('alert_danger', 'Usulan Evaluasi Mutasi dari Unit Ditolak!');
        redirect('AdministratorInduk/tampilanUsulanLembarEvaluasi');
    }

    public function reviewUsulan($id_usulan)
    {
        $where         = array('id_usulan' => $id_usulan);
        $input         = $this->input->post(NULL, TRUE);
        $data          = array(
            'status_usulan'     => 'dipending',

        );
        $this->Crud->u('tb_usulan_evaluasi', $data, $where);
        $this->session->set_flashdata('alert_warning', 'Usulan Evaluasi Mutasi dari Unit Ditinjau Kembali!');
        redirect('AdministratorInduk/tampilanUsulanLembarEvaluasi');
    }
# ************ End Menu Lembar Evaluasi dari Unit ******************

# ************ Begin Menu Pencarian Data Pegawai ******************
    public function tampilanPencarian()
    {
        $data   = array(
            'isi'                       => 'user/contents/administrator_induk/tabelPencarianDataPegawai',
            'title'                     => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar'
        );

        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function showAllNilaiTalenta()
    {
        $id_pegawai = $this->input->post('nip_talenta', TRUE);
        $where      = array('nip' => $id_pegawai);
        $talentaPeg = $this->Crud->gwo('tb_nilai_talenta_pegawai', $where, 'tahun_talenta', 'desc');
        echo json_encode($talentaPeg);
    }
# ************ End Menu Pencarian Data Pegawai ********************

# ************ Begin Menu Fungsi download ********************
    public function doDownload()
    {
        $this->load->helper('download');
        force_download('assets/user/administrator_induk/templates/template tambah dan unggah data pegawai massal.xlsx', NULL);
    }
# ************ End Menu Fungsi download ********************
    
}