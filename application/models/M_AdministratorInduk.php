<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_AdministratorInduk extends CI_Model {
    
    public function ca($t){return $this->db->get($t)->num_rows();} //count all

    public function getDataPegawai() {
        return $this->db->from('tb_pegawai')
          ->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan=tb_pegawai.id_sebutan_jabatan', 'left')
          ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_jabatan.personnel_subarea', 'left')
          ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
          ->get()
          ->result();
    }

    public function getPegawaiById($id){
        $this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan=tb_pegawai.id_sebutan_jabatan', 'left');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left');
        $this->db->where(array('nip' =>  $id));
        $query = $this->db->get();
        return $query;
    }

    public function getDataSubarea() {
        return $this->db->from('tb_personnel_area')
          ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
          ->get()
          ->result();
    }

    public function getDataAdmin() {
        return $this->db->from('tb_administrator')
          ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_administrator.personnel_subarea', 'left')
          ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
          ->get()
          ->result();
    }

    public function getAdminById($id){
        $this->db->from('tb_administrator');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_administrator.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
        $this->db->where(array('id_administrator' =>  $id));
        $query = $this->db->get();
        return $query;
    }

    public function getJabatanById($id){
        $this->db->from('tb_jabatan');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
        $this->db->where(array('id_sebutan_jabatan' =>  $id));
        $query = $this->db->get();
        return $query;
    }

}
