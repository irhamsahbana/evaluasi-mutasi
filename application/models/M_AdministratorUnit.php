<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_AdministratorUnit extends CI_Model {
    
    public function ca($t){return $this->db->get($t)->num_rows();} //count all

    public function getDataApproval() {
        return $this->db->from('tb_approval_committee')
          ->join('tb_pegawai', 'tb_pegawai.nip=tb_approval_committee.nip', 'left')
          ->get()
          ->result();
    }

    public function getPegawaiById($id) {
        $this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan=tb_pegawai.id_sebutan_jabatan', 'left');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left');
        $this->db->where(array('nip' =>  $id));
        $query = $this->db->get();
        return $query;
    }
}
