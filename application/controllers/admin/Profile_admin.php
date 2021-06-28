<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_admin extends CI_Controller {


    function __construct() {
        parent::__construct();
        if ( empty( $this->session->userdata('sess_id_profile') )  ) {
            
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                        <small>Anda harus login terlebih dahulu !</small>
                    </div>';
            $this->session->set_flashdata('msg', $html);
            redirect("admin/login");
        }if($this->session->userdata('sess_level') != "staff"){
            $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> 
                    <small>Anda Bukan Staff!</small>
                </div>';
            $this->session->set_flashdata('msg', $html);
            $this->session->sess_destroy();
            redirect('admin/login', 'refresh');
        }

        $this->load->model('M_dashboard');
    }

    public function index()
    {
         //-- Title Halaman
         $data ['title'] = 'Halaman Profile Admin | admin';
         //----------------------------

        $this->load->view('Template/admin/navbar',$data);
        $this->load->view('Template/admin/sidebar',$data);
        $this->load->view('admin/profile_admin/index.php',$data);
        $this->load->view('Template/admin/footer');
    }


}

/* End of file Controllername.php */

?>