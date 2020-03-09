<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelAdmin extends CI_Model {

	public function login($username, $password){

        $set_table = $this->db->get('admin');
        $query = $this->db->get_where('admin', array('username_admin' => $username, 'password_admin' => $password));
        //$query = $this->db->query ("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        if($query->num_rows()>0){
            foreach ($query->result() as $x){
                $sess = array(
                    "id_admin"				=>	$x->id_admin,
                    'username_admin'		=>	$x->username_admin,
                    'status_admin'			=> $x->status_admin,
                    'nama_lengkap_admin'	=> $x->nama_lengkap_admin,
                    'foto_admin'            => $x->foto_admin,
                    'password_admin'        => $x->password_admin,
                    "status" 				=> "login",
                );
            }
            $this->session->set_userdata($sess);
            redirect('administrator');
        }else{
           $this->session->set_flashdata('info', 'Username dan Password Anda Salah !');
            redirect('login');
        }
    }
}
