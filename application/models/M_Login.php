<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Login extends CI_Model
{

    public function mLoginAdmin($nip, $password)
    {

        $this->db->where('nip', $nip);
        $query = $this->db->get('tb_administrator');

        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                foreach ($query->result() as $x) {
                    $sess = array(
                        "id_administrator"  => $x->id_administrator,
                        'nip'               => $x->nip,
                        'role'              => $x->role,
                        'personnel_subarea' => $x->personnel_subarea,
                        'password'          => $x->password,
                        "status"            => "login",
                    );
                }
                $this->session->set_userdata($sess);
                if ($this->session->userdata('role') == 'admin_induk') {
                    redirect('AdministratorInduk');
                } elseif ($this->session->userdata('role') == 'admin_unit') {
                    redirect('AdministratorUnit');
                } else {
                    redirect('Login');
                    $this->session->set_flashdata('info', 'Nomor Induk Pegawai dan Password Anda Salah !');
                }
            } else {
                $this->session->set_flashdata('info', 'Nomor Induk Pegawai dan Password Anda Salah !');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('info', 'Nomor Induk Pegawai tidak terdaftar sebagai administrator!');
            redirect('login');
        }
    }

    public function mLoginApproval($nip, $password)
    {

        $this->db->where('nip', $nip);
        $query = $this->db->get('tb_approval_committee');

        if ($query->num_rows() > 0) {
            $hash = $query->row('password');
            if (password_verify($password, $hash)) {
                foreach ($query->result() as $x) {
                    $sess = array(
                        "id_administrator"  => $x->id_approval,
                        'nip'               => $x->nip,
                        'role'              => $x->role,
                        'password'          => $x->password,
                        "status"            => "login",
                    );
                }
                $this->session->set_userdata($sess);
                redirect('AdministratorInduk');
            } else {
                $this->session->set_flashdata('info', 'Nomor Induk Pegawai dan Password Anda Salah !');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('info', 'Nomor Induk Pegawai tidak terdaftar sebagai approval committee!');
            redirect('login');
        }
    }
}
