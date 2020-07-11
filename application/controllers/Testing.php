 <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    class Testing extends CI_Controller
    {
        public function pegawai()
        {
            
            $dataPeg = $this->M_AdministratorInduk->getPegawaiById('8106325Z')->result();
            $talentaPeg = $this->M_AdministratorInduk->nilaiTalenta3Terakhir('8106325Z');
            $data =json_encode($talentaPeg);
            echo $data;

        }

        public function tgl()
        {
            $tgl = '2019-03-01';
            $array = array(
                'lama_menjabat' => berapa_lama($tgl)
            );
            $lama = json_encode($array);
            echo $lama;
        }
    }
