<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Makassar');
    }

    public function index()
    {
        if ($this->session->userdata('status') == 'login') {
            if ($this->session->userdata('role') == 'admin_induk') {
                redirect('AdministratorInduk');
            }
            else if ($this->session->userdata('role') == 'admin_unit') {
                redirect('AdministratorUnit');
            }
            else if ($this->session->userdata('role') == 'approval_committee') {
                redirect('ApprovalCommittee');
            }
        } else {
            $this->load->view('login/newLogin');
        }
    }

    public function loginLama()
    {
        $this->load->view('login/login');
    }

    public function cekLogin()
    {
        $username = $this->input->post('username');
        $cek_pass = $this->input->post('password');
        $password = md5($cek_pass);
        $this->ModelUser->login($username, $password);
    }

    public function LoginAdmin()
    {
        $nip = $this->input->post('nip_administrator');
        $password = $this->input->post('password_administrator');
        $this->M_Login->mLoginAdmin($nip, $password);
    }

    public function loginApproval()
    {
        $nip = $this->input->post('nip_approval');
        $password = $this->input->post('password_approval');
        $this->M_Login->mLoginApproval($nip, $password);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Login');
    }

    public function tampilanForgotPassword()
    {
        $this->load->view('login/forgotPasswordApproval');
    }

    public function forgotPassword()
    {
        $this->load->helper('url');
        $email_approval = $this->input->post('email', TRUE);
        $this->form_validation->set_rules('email', 'email', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('message','Try again!');      
            redirect('Login/tampilanForgotPassword');
        } else {
            // $query = $this->db->get_where('tb_approval_committee', array('email' => $email_approval));
            $query = $this->db->from('tb_approval_committee')->join('tb_pegawai', 'tb_pegawai.nip = tb_approval_committee.nip', 'left')->where(array('tb_pegawai.email' => $email_approval))->get();
            if ($query->num_rows() > 0) {
                $r = $query->result();
                $user = $r[0];

                $password = random_string('alnum', 6);
                $this->db->where('id_approval', $user->id_approval);
                $this->db->update('tb_approval_committee', array('password' => password_hash($password, PASSWORD_DEFAULT)));

                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();

                // SMTP configuration
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'tim2016kp@gmail.com';
                $mail->Password   = 'qa1ws2ed3';
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;
        
                $mail->setFrom('tim2016kp@gmail.com', 'Sistem Website Evaluasi Mutasi - PT. PLN (Persero) Unit Induk Wilayah Sulselrabar');

                // Add a recipient
                $mail->addAddress($user->email);

                // Email subject
                $mail->Subject = 'Password Reset';
        
                // Email body content
                $mail->Body = 'Anda baru saja meminta untuk mereset password anda sebagai Approval Committee, Ini adalah password baru anda : '. $password;
        
                // Send email
                if(!$mail->send()){
                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                }else{
                    $this->session->set_flashdata('message','Password berhasil direset, silahkan cek email anda! : '.$email_approval);
                    redirect('Login/tampilanForgotPassword');
                }

                // if($this->email->send()) {
                //     redirect('Login');
                // } else {
                //     $this->session->set_flashdata('message','Cannot send email');
                //     redirect('Login/tampilanForgotPassword');
                // }
            } else {
                $this->session->set_flashdata('message','Email tidak terdaftar di dalam basis data pegawai / Email tersebut tidak terdaftar sebagai approval committee!');
                redirect('Login/tampilanForgotPassword');
            }
        }
    }

}
