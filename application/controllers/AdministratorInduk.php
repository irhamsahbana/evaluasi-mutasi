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
            'data_pegawai' => $this->Crud->ga('tb_pegawai'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
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

}