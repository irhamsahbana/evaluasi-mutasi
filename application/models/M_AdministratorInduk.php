<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_AdministratorInduk extends CI_Model
{

    public function ca($t)
    {
        return $this->db->get($t)->num_rows();
    } //count all

    public function getDataPegawai()
    {
        return $this->db->from('tb_pegawai')
            ->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan=tb_pegawai.id_sebutan_jabatan', 'left')
            ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_jabatan.personnel_subarea', 'left')
            ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
            ->get()
            ->result();
    }

    public function getPegawaiById($id)
    {
        $this->db->from('tb_pegawai');
        $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan=tb_pegawai.id_sebutan_jabatan', 'left');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left');
        $this->db->where(array('nip' =>  $id));
        $query = $this->db->get();
        return $query;
    }

    public function getDataSubarea()
    {
        return $this->db->from('tb_personnel_area')
            ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
            ->get()
            ->result();
    }

    public function getDataAdmin()
    {
        return $this->db->from('tb_administrator')
            ->join('tb_pegawai', 'tb_pegawai.nip = tb_administrator.nip', 'left')
            ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea=tb_administrator.personnel_subarea', 'left')
            ->join('tb_business_area', 'tb_business_area.business_area=tb_personnel_area.business_area', 'left')
            ->get()
            ->result();
    }

    public function getAdminById($id)
    {
        $this->db->from('tb_administrator');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_administrator.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
        $this->db->where(array('id_administrator' =>  $id));
        $query = $this->db->get();
        return $query;
    }

    public function getJabatanById($id)
    {
        $this->db->from('tb_jabatan');
        $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
        $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
        $this->db->where(array('id_sebutan_jabatan' =>  $id));
        $query = $this->db->get();
        return $query;
    }

    public function getDataApproval()
    {
        return $this->db
            ->from('tb_approval_committee')
            ->join('tb_pegawai', 'tb_pegawai.nip=tb_approval_committee.nip', 'left')
            ->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left')
            ->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left')
            ->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left')
            ->get()
            ->result();
    }

# ************ Begin Menu Nilai Talenta Pegawai ******************
    public function nilaiTalentaPegawai($where)
    {
        $this->db->from('tb_nilai_talenta_pegawai');
            $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_nilai_talenta_pegawai.nip', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left');
            $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
            $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
            $this->db->where($where);
            $query = $this->db->get()->result();
            return $query;
    }
# ************ End Menu Nilai Talenta Pegawai ******************

# ************ Begin Menu Lembar Evaluasi ******************
        public function usulanLembarEvaluasiDiterima()
        {
            $this->db->from('tb_usulan_evaluasi');
            $this->db->join('tb_administrator', 'tb_administrator.id_administrator = tb_usulan_evaluasi.id_administrator', 'left');
            $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_administrator.nip', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left');
            $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
            $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
            $this->db->where(array('status_usulan' => 'diterima'));
            $query = $this->db->get()->result();
            return $query;
        }

        public function usulanLembarEvaluasiDipending()
        {
            $this->db->from('tb_usulan_evaluasi');
            $this->db->join('tb_administrator', 'tb_administrator.id_administrator = tb_usulan_evaluasi.id_administrator', 'left');
            $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_administrator.nip', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left');
            $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
            $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
            $this->db->where(array('status_usulan' => 'dipending'));
            $query = $this->db->get()->result();
            return $query;
        }

        public function usulanLembarEvaluasiDitolak()
        {
            $this->db->from('tb_usulan_evaluasi');
            $this->db->join('tb_administrator', 'tb_administrator.id_administrator = tb_usulan_evaluasi.id_administrator', 'left');
            $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_administrator.nip', 'left');
            $this->db->join('tb_jabatan', 'tb_jabatan.id_sebutan_jabatan = tb_pegawai.id_sebutan_jabatan', 'left');
            $this->db->join('tb_personnel_area', 'tb_personnel_area.personnel_subarea = tb_jabatan.personnel_subarea', 'left');
            $this->db->join('tb_business_area', 'tb_business_area.business_area = tb_personnel_area.business_area', 'left');
            $this->db->where(array('status_usulan' => 'ditolak'));
            $query = $this->db->get()->result();
            return $query;
        }

        public function nilaiTalenta3Terakhir($nip)
        {
            $this->db->select('*');
            $this->db->from('tb_nilai_talenta_pegawai');
            $this->db->where(array('nip' => $nip));
            $this->db->order_by('tahun_talenta', 'desc');
            $this->db->order_by('semester_talenta', 'desc');
            $this->db->limit(3);
            $query = $this->db->get()->result();
            return $query;
        }

        public function rincianApprovalUsulan($id_usulan)
        {
            $this->db->from('tb_usulan_evaluasi_approval');
            $this->db->join('tb_approval_committee', 'tb_usulan_evaluasi_approval.id_approval = tb_approval_committee.id_approval', 'left');
            $this->db->join('tb_posisi_approval_committee', 'tb_posisi_approval_committee.id_posisi = tb_usulan_evaluasi_approval.id_posisi', 'left');
            $this->db->join('tb_pegawai', 'tb_pegawai.nip = tb_approval_committee.nip', 'left');

            $this->db->where($id_usulan);
            $query = $this->db->get()->result();
            return $query;
        }
# ************ End Menu Lembar Evaluasi ******************
}
