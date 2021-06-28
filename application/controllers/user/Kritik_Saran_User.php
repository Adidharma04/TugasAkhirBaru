<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kritik_saran_user extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Penilaian_model');
    }
    public function index()
    {
        $data['penilaian'] = $this->Penilaian_model->tampilDataPenilaian(); 
        
        $this->load->view('user/kritik_saran', $data);
    }
}
?>