<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_AdministratorInduk extends CI_Model {
    
    public function ca($t){return $this->db->get($t)->num_rows();} //count all

    public function getDataPegawai() {
        return $this->db->from('tb_pegawai')
          ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_pegawai.personnel_subarea', 'inner')
          ->join('tb_jabatan', 'tb_jabatan.personnel_subarea=tb_pegawai.personnel_subarea', 'inner')
          ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'inner')
          ->get()
          ->result();
    }

    public function tampilSubarea() {
        return $this->db->from('tb_personnel_area')
          ->order_by('nama_business_area', 'ASC')
          ->join('tb_business_area', 'tb_personnel_area.business_area=tb_business_area.business_area', 'inner')
          ->get()
          ->result();
    }

    public function getAreaRows($params = array()) {
        $this->db->select('a.business_area, a.nama_business_area');
        $this->db->from('tb_business_area as a');

        //fetch data by conditions
        if(array_key_exists("conditions", $params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key, '.') !== false){
                    $this->db->where($key, $value);
                }else {
                    $this->db->where('a.'.$key, $value);
                }
            }
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }

    public function getSubareaRows($params = array()) {
        $this->db->select('s.personnel_subarea, s.nama_personnel_subarea');
        $this->db->from('tb_personnel_area as s');

        //fetch data by conditions
        if(array_key_exists("conditions", $params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key, '.') !== false){
                    $this->db->where($key, $value);
                }else {
                    $this->db->where('s.'.$key, $value);
                }
            }
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }

    public function getJabatanRows($params = array()) {
        $this->db->select('j.id_sebutan_jabatan, j.sebutan_jabatan');
        $this->db->from('tb_jabatan as j');

        //fetch data by conditions
        if(array_key_exists("conditions", $params)){
            foreach ($params['conditions'] as $key => $value) {
                if(strpos($key, '.') !== false){
                    $this->db->where($key, $value);
                }else {
                    $this->db->where('j.'.$key, $value);
                }
            }
        }

        $query = $this->db->get();
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE;

        //return fetched data
        return $result;
    }
}
