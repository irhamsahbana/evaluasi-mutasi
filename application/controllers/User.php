<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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

	/****************************************
	Mulai
	Kerjaanya Irham
	jangan sentuh-sentuh diantara komen ini!
	****************************************/
	public function tampilanDataPribadiPegawai()
	{
		$data = array(
            'isi' => 'user/contents/dataPribadiPegawai',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	/****************************************
	Selesai
	Kerjaanya Irham
	jangan sentuh-sentuh diantara komen ini!
	****************************************/



	/****************************************
	Mulai
	Kerjaanya Ghina
	jangan sentuh-sentuh diantara komen ini!
	****************************************/
	public function tampilanMenuUsulan()
	{
		$data = array(
            'isi' => 'user/contents/menuUsulan',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	

	public function tampilanApprovalCommittee()
	{
		$data = array(
            'isi' => 'user/contents/tabelApprovalCommittee',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanDaftarJabatan()
	{
		$data = array(
            'isi' => 'user/contents/tabelDaftarJabatan',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanUsulanEvaluasiDariUnit()
	{
		$data = array(
            'isi' => 'user/contents/tabelUsulanEvaluasiDariUnit',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanUsulanEvaluasiYangDitolak()
	{
		$data = array(
            'isi' => 'user/contents/tabelUsulanEvaluasiYangDitolak',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanLembarEvaluasi()
	{
		$data = array(
            'isi' => 'user/contents/tabelLembarEvaluasi',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}
	
	public function tampilanPengaturanPengguna()
	{
		$data = array(
            'isi' => 'user/contents/tabelPengaturanPengguna',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
            'data_user' => $this->Crud->ga('user'),
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanUsulanEvaluasiMasuk()
	{
		$data = array(
            'isi' => 'user/contents/tabelUsulanEvaluasiMasuk',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanUsulanEvaluasi()
	{
		$data = array(
            'isi' => 'user/contents/tabelUsulanEvaluasi',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanDaftarUnit()
	{
		$data = array(
            'isi' => 'user/contents/tabelDaftarUnit',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	public function tampilanNilaiTalenta()
	{
		$data = array(
            'isi' => 'user/contents/tabelNilaiTalenta',
            'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar', 
        );
        $this->load->view('user/_layouts/wrapper', $data);
	}

	

	/****************************************
	Selesai
	Kerjaanya Ghina
	jangan sentuh-sentuh diantara komen ini!
	****************************************/

	

	/****************************************
	Mulai
	Kerjaanya Okti
	jangan sentuh-sentuh diantara komen ini!
	****************************************/

	

	/****************************************
	Selesai
	Kerjaanya Okti
	jangan sentuh-sentuh diantara komen ini!
	****************************************/		
}

