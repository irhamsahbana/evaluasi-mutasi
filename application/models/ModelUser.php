<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUser extends CI_Model {

	public function login($username, $password){

        $set_table = $this->db->get('user');
        $query = $this->db->get_where('user', array('username_user' => $username, 'password_user' => $password));
        //$query = $this->db->query ("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        if($query->num_rows()>0){
            foreach ($query->result() as $x){
                $sess = array(
                    "id_user"				=> $x->id_user,
                    'username_user'		    => $x->username_user,
                    'status_user'			=> $x->status_user,
                    'fullname_user'	        => $x->fullname_user,
                    'foto_user'             => $x->foto_user,
                    'password_user'         => $x->password_user,
                    "status" 				=> "login",
                );
            }
            $this->session->set_userdata($sess);
            redirect('user');
        }else{
           $this->session->set_flashdata('info', 'Username dan Password Anda Salah !');
            redirect('login');
        }
    }
}
