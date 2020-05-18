<?php defined('BASEPATH') or exit('No direct script access allowed');
class M_ApprovalCommittee extends CI_Model
{

    public function ca($t)
    {
        return $this->db->get($t)->num_rows();
    } //count all
}
