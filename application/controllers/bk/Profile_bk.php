<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_bk extends CI_Controller {


    function __construct() {
        parent::__construct();
        if ( empty( $this->session->userdata('sess_id_profile') )  ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "bk"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Guru BK!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }
        $this->load->model('M_dashboard');
        $this->load->model('admin/Pegawai_model');
    }
    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Profile | admin';
         //----------------------------

        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar_bk',$data);
        $this->load->view('bk/profile_bk/index',$data);
        $this->load->view('Template/admin/footer');
    }

}

/* End of file Controllername.php */

?>