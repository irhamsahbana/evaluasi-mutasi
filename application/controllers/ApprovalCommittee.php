<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApprovalCommittee extends CI_Controller {

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

    public function tampilanApprovalCommittee()
    {
        $data = array(
            'isi' => 'user/contents/approval_committee/tabelApprovalCommittee',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_pegawai' => $this->Crud->ga('tb_approval_committee'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
    }

    public function doAddPegawai() {
        $input        = $this->input->post(NULL, TRUE);
        $filenya      = $_FILES['file_ttd']['name'];

        if($filenya = ''){
        $this->session->set_flashdata('info', 'File Tidak Terpilih'); 

        if($kode == '1'){
                redirect('ApprovalCommittee/approval_committee');
            }else{
                redirect('admin');
            }

        }else{
            if($kode == '1'){
                $config['upload_path'] = './asset/user/approval_committee';

         }
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '0';

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('file_ttd')){
                // die();
                $this->session->set_flashdata('info', 'Upload File Gagal, Periksa Ukuran dan Ekstensi');
                redirect('ApprovalCommittee/tampilanApprovalCommittee/'.$kode);
            }else{
                $filenya =  $this->upload->data('file_name');
            }

        $data_pegawai = array(
            'nip'                       => $input['nipeg'],
            'nama_approval'             => $input['nama_approval'],
            'file_ttd'                  => $input['file_ttd'],
        );
        $this->db->set('id_approval', 'UUID()', FALSE);
        $this->db->insert('tb_approval_committee', $data_pegawai);
        redirect('ApprovalCommittee/tampilanApprovalCommittee');
    }
}

    public function doDeletePegawai($id){
        $where = array('id_approval' => $id,);

        $this->Crud->d('tb_approval_committee', $where);
        $this->session->set_flashdata('info', 'Data Pegawai Telah Dihapus');
        redirect('ApprovalCommittee/tampilanApprovalCommittee');
    }



    public function doUpdatePegawai($id){
        $where         = array('id_approval' => $id);
        $input         = $this->input->post(NULL, TRUE);
        $data_pegawai  = array(
            'nip'                       => $input['nipeg'],
            'nama_approval'             => $input['nama_approval'],
            'file_ttd'                  => $input['file_ttd'],
            
        );
        $this->Crud->u('tb_approval_committee', $data_pegawai, $where);
        $this->session->set_flashdata('info', 'Data Pegawai Berhasil Diupdate');
        redirect('ApprovalCommittee/tampilanApprovalCommittee');
    }
}