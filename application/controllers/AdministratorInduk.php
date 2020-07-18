<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdministratorInduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
        if ($this->session->userdata('status') != "login") {
            redirect('Login');
        }
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));
    }

    public function index()
    {
        $data = array(
            'isi'   => 'user/contents/testing',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
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

    public function doDeletePegawai($id)
    {
        $where = array('nip' => $id,);

        $this->Crud->d('tb_pegawai', $where);
        $this->session->set_flashdata('alert_danger', 'Data pegawai berhasil dihapus!');
        redirect('AdministratorInduk/tampilanDataPegawai');
    }

    public function doImportPegawai()
    {
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

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
            $inputFileName = './assets/user/administrator_induk/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

                $tgl_grade          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][11]));
                $tgl_lahir          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][13]));
                $tgl_capeg          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][14]));
                $tgl_pegawai_tetap  = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][15]));
                $tgl_masuk          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][18]));

                $data = array(
                    "pers_no"               => strtoupper($rowData[0][0]),
                    "nip"                   => strtoupper($rowData[0][1]),
                    "nama_pegawai"          => strtoupper($rowData[0][2]),
                    "id_sebutan_jabatan"    => strtoupper($rowData[0][3]),
                    "org_unit"              => strtoupper($rowData[0][4]),
                    "organizational_unit"   => strtoupper($rowData[0][5]),
                    "position"              => strtoupper($rowData[0][6]),
                    "nama_panjang_posisi"   => strtoupper($rowData[0][7]),
                    "jenjang_main_grp"      => strtoupper($rowData[0][8]),
                    "jenjang_sub_grp"       => strtoupper($rowData[0][9]),
                    "grade"                 => strtoupper($rowData[0][10]),
                    "tgl_grade"             => $tgl_grade,
                    "pendidikan_terakhir"   => strtoupper($rowData[0][12]),
                    "tgl_lahir"             => $tgl_lahir,
                    "tgl_capeg"             => $tgl_capeg,
                    "tgl_pegawai_tetap"     => $tgl_pegawai_tetap,
                    "gender"                => strtoupper($rowData[0][16]),
                    "email"                 => strtoupper($rowData[0][17]),
                    "tgl_masuk"             => $tgl_masuk,
                    "agama"                 => strtoupper($rowData[0][19]),
                    "no_telp"               => strtoupper($rowData[0][20]),
                );
                $this->db->insert("tb_pegawai", $data);
            }
            $fileName_ = str_replace(" ", "_", $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName_);
            $this->session->set_flashdata('alert_success', 'Data pegawai berhasil diimpor!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        }
    }

    public function doImportUpdatePegawai()
    {
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

        $fileName = $_FILES['file_sunting_data_pegawai']['name'];

        $config['upload_path'] = './assets/user/administrator_induk';
        $config['file_name'] = $fileName;
        $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
        $config['max_size'] = 10000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_sunting_data_pegawai')) {
            $this->session->set_flashdata('alert_danger', 'File untuk sunting data pegawai gagal diimpor!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        } else {
            $media = $this->upload->data();
            $inputFileName = './assets/user/administrator_induk/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

                $tgl_grade          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][11]));
                $tgl_lahir          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][13]));
                $tgl_capeg          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][14]));
                $tgl_pegawai_tetap  = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][15]));
                $tgl_masuk          = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($rowData[0][18]));

                $data = array(
                    "pers_no"               => strtoupper($rowData[0][0]),
                    "nip"                   => strtoupper($rowData[0][1]),
                    "nama_pegawai"          => strtoupper($rowData[0][2]),
                    "id_sebutan_jabatan"    => strtoupper($rowData[0][3]),
                    "org_unit"              => strtoupper($rowData[0][4]),
                    "organizational_unit"   => strtoupper($rowData[0][5]),
                    "position"              => strtoupper($rowData[0][6]),
                    "nama_panjang_posisi"   => strtoupper($rowData[0][7]),
                    "jenjang_main_grp"      => strtoupper($rowData[0][8]),
                    "jenjang_sub_grp"       => strtoupper($rowData[0][9]),
                    "grade"                 => strtoupper($rowData[0][10]),
                    "tgl_grade"             => $tgl_grade,
                    "pendidikan_terakhir"   => strtoupper($rowData[0][12]),
                    "tgl_lahir"             => $tgl_lahir,
                    "tgl_capeg"             => $tgl_capeg,
                    "tgl_pegawai_tetap"     => $tgl_pegawai_tetap,
                    "gender"                => strtoupper($rowData[0][16]),
                    "email"                 => strtoupper($rowData[0][17]),
                    "tgl_masuk"             => $tgl_masuk,
                    "agama"                 => strtoupper($rowData[0][19]),
                    "no_telp"               => strtoupper($rowData[0][20]),
                );
                $where = array('nip' => $rowData[0][1]);
                $this->Crud->u("tb_pegawai", $data, $where);
            }
            $fileName_ = str_replace(" ", "_", $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName_);
            $this->session->set_flashdata('alert_primary', 'Data-data pegawai berhasil disunting!');
            redirect('AdministratorInduk/tampilanDataPegawai');
        }
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

    public function doAddDaftarTalenta()
    {
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
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
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
        );
        $this->Crud->u('tb_daftar_talenta_per_semester', $data, $where);
        $this->session->set_flashdata('alert_primary', 'Data semester berhasil disunting!');
        redirect('AdministratorInduk/tampilanDaftarTalenta');
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
            'tb_talenta' => $this->Crud->gw('tb_nilai_talenta_pegawai', $where),
            'judul_tahun' => $tahun,
            'judul_semester' => $semester,
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddTalentaPegawai()
    {
        $input      = $this->input->post(NULL, TRUE);
        $data       = array(
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
            'nip'                  => $input['nip'],
            'nilai_talenta'        => $input['nilai_talenta'],
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
            'tahun_talenta'        => $input['tahun'],
            'semester_talenta'     => $input['semester'],
            'nip'                  => $input['nip'],
            'nilai_talenta'        => $input['nilai_talenta'],
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

    public function doImportTalentaPegawai()
    {
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

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
            $inputFileName = './assets/user/administrator_induk/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );

                $data = array(
                    "nip"                   => $rowData[0][0],
                    "tahun_talenta"         => $rowData[0][1],
                    "semester_talenta"      => $rowData[0][2],
                    "nilai_talenta"         => $rowData[0][3],
                );
                $this->db->insert("tb_nilai_talenta_pegawai", $data);
            }
            $fileName_ = str_replace(" ", "_", $fileName);
            unlink('./assets/user/administrator_induk/' . $fileName_);
            unlink('./assets/user/administrator_induk/' . $fileName);
            $this->session->set_flashdata('alert_success', 'Nilai talenta pegawai berhasil diimpor!');

            $baris = 2;
            $barisData = $sheet->rangeToArray('A' . $baris . ':' . $highestColumn . $baris, NULL, TRUE, FALSE);
            $urisTahun = $barisData[0][1];
            $urisSemester = $barisData[0][2];
            redirect('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $urisTahun . '/' . $urisSemester);
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
            'nip'                       => $input['nipeg'],
            'password'                  => password_hash($input['password'], PASSWORD_DEFAULT),
            'role'                      => 'approval_committee',
        );
        $this->db->set('id_approval', 'UUID()', FALSE);
        $this->db->insert('tb_approval_committee', $data_penerima);
        $this->session->set_flashdata('alert_success', 'Data penerima berhasil ditambahkan!');
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
        $input         = $this->input->post(NULL, FALSE);

        if ($input['password'] != '') {
            $items = array(
                'nip'        => $input['nipeg'],
                'password'   => password_hash($input['password'], PASSWORD_DEFAULT),
            );
        } else {
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
    public function tampilanJabatan()
    {
        $this->db->select('*');
        $this->db->from('tb_jabatan');
        $this->db->order_by('personnel_subarea', 'asc');
        $this->db->order_by('urutan_dalam_org', 'asc');
        $query = $this->db->get();
        $data_jabatan = $query->result();


        $data = array(
            'isi'           => 'user/contents/administrator_induk/tabelDaftarJabatan',
            'title'         => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_jabatan'  => $data_jabatan,
            'area'          =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddJabatan()
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
        redirect('AdministratorInduk/tampilanJabatan');
    }

    public function getEditJabatan($id_jabatan)
    {
        $where = array('id_sebutan_jabatan' => $id_jabatan);
        $data = array(
            'isi'              => 'user/contents/administrator_induk/editDataJabatan',
            'title'            => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_jabatan'     => $this->Crud->gw('tb_jabatan', $where),
            'area'             => $this->Crud->ga('tb_business_area'),
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

    public function doUpdateJabatan()
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
        redirect('AdministratorInduk/tampilanJabatan');
    }

    public function doDeleteJabatan($id)
    {
        $where = array('id_sebutan_jabatan' => $id);

        $this->Crud->d('tb_jabatan', $where);
        $this->session->set_flashdata('alert_danger', 'Data jabatan berhasil dihapus!');
        redirect('AdministratorInduk/tampilanJabatan');
    }

    public function doImportJabatan()
    {
        $this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

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
            $inputFileName = './assets/user/administrator_induk/' . $media['file_name'];

            try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++) {
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );
                $data = array(
                    "id_sebutan_jabatan" => $rowData[0][2] . '-' . $rowData[0][0],
                    "urutan_dalam_org" => $rowData[0][0],
                    "sebutan_jabatan" => $rowData[0][1],
                    "Personnel_subarea" => $rowData[0][2],
                );
                $this->db->insert("tb_jabatan", $data);
            }
            unlink('./assets/user/administrator_induk/' . $fileName);
            $this->session->set_flashdata('alert_success', 'Daftar sebutan jabatan berhasil diimpor!');
            redirect('AdministratorInduk/tampilanJabatan');
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
                'nip'                => $input['nip'],
                'password'           => password_hash($input['password'], PASSWORD_DEFAULT),
                'role'               => $input['status'],
                'personnel_subarea'  => $input['personnel_subarea'],
            );
        } else {
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

    public function doDeleteAdmin($id)
    {
        $where = array('id_administrator' => $id,);

        $this->Crud->d('tb_administrator', $where);
        $this->session->set_flashdata('alert_danger', 'Data administrator berhasil dihapus!');
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
        $id_pegawai = $this->input->post('nip', FALSE);
        $dataPeg = $this->M_AdministratorInduk->getPegawaiById($id_pegawai)->result();
        echo json_encode($dataPeg);
    }

    public function autoFillTalenta()
    {
        $id_pegawai = $this->input->post('nip_talenta', FALSE);
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
# ************ End Menu Lembar Evaluasi ******************

# ************ Begin Menu Data Pegawai Dan Talenta ******************
    public function tampilanDataPegawaiTalenta()
    {
        $data = array(
            'isi' => 'user/contents/administrator_induk/tabelDataPegawaiTalenta',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            'data_pegawai' => $this->M_AdministratorInduk->getDataPegawai(),
            'area' =>  $this->Crud->ga('tb_business_area'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function getNilaiTalenta()
    {
        $personnel_subarea = $this->input->post('id', TRUE);
        $data = $this->Crud->gwo('tb_nilai_talenta_pegawai', array('nilai_talenta' => $nilai_talenta));
        echo json_encode($data);
    }
# ************ End Menu Data Pegawai Dan Talenta ******************
    
}

