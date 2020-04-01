<?php defined('BASEPATH') OR exit('No direct script access allowed');
class M_AdministratorUnit extends CI_Model {
    
    public function ca($t){return $this->db->get($t)->num_rows();} //count all
}
