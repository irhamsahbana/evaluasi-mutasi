 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Okti1 extends CI_Controller
    {

        public function __construct()
        {
            parent::__construct();
            date_default_timezone_set('Asia/Makassar');
            if ($this->session->userdata('status') != "login") {
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
        public function tampilanDataPribadiPegawai()
        {
            $data = array(
                'isi' => 'user/contents/dataPribadiPegawai',
                'title' => 'Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar',
            );
            $this->load->view('user/_layouts/wrapper', $data);
        }
        public function doAddPengguna()
        {
            $input = $this->input->post(NULL, TRUE);
            $data = array(
                'username_user'            => $input['username'],
                'password_user'             => $input['password'],
                'status_user'             => $input['status_pengguna'],
                'fullname_user'             => $input['nama_lengkap'],
            );
            $this->db->insert('user', $data);
            redirect('user/tampilanPengaturanPengguna');
        }

        //Begin Do Delete Mahasiswa
        public function doDeletePengguna($id)
        {
            $where = array('id_user' => $id,);

            $this->Crud->d('user', $where);
            $this->session->set_flashdata('info', 'Data Mahasiswa Telah Dihapus');
            redirect('user/tampilanPengaturanPengguna');
        }
        //End Do Delete Mahasiswa
    }
