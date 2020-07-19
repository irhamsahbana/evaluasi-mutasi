<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_ApprovalCommittee extends CI_Model
{

    public function ca($t)
    {
        return $this->db->get($t)->num_rows();
    } //count all

    public function getDataUsulanMasuk($id_approval)
    {
        return $this->db->from('tb_usulan_evaluasi')
        	->join('tb_usulan_evaluasi_approval', 'tb_usulan_evaluasi_approval.id_usulan=tb_usulan_evaluasi.id_usulan')
            ->join('tb_administrator', 'tb_administrator.id_administrator=tb_usulan_evaluasi.id_administrator', 'left')
            ->join('tb_pegawai', 'tb_pegawai.nip=tb_administrator.nip', 'left')
            ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_administrator.personnel_subarea', 'left')
            ->where(array('status_usulan' => 'diterima', 'id_approval' => $id_approval))
            ->get()
            ->result();
    }

    public function usulanLembarEvaluasiMasuk()
    {
        $this->db->from('tb_usulan_evaluasi');
        $this->db->join('tb_usulan_evaluasi_approval', 'tb_usulan_evaluasi_approval.id_usulan = tb_usulan_evaluasi.id_usulan', 'left');
        $this->db->join('tb_administrator', 'tb_administrator.id_administrator = tb_usulan_evaluasi.id_administrator', 'left');
        $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_administrator.nip', 'left');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
        $this->db->where(
            array(
                'status_usulan' => 'diterima',
                'id_approval'   => $this->session->userdata('id_administrator'),
            )
        );
        $query = $this->db->get()->result();
        return $query;
    }
}
