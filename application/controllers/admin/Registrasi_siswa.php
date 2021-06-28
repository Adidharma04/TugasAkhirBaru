<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Siswa_model');
        if (empty($this->session->userdata('sess_id_profile'))) {

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
    }
    public function index()
    {
        //-- rule--//
        $this->form_validation->set_rules('nis', 'Nis ', 'required|trim|is_unique[profil_siswa.nis]', [
            'required' => 'Masukkan No Induk Siswa',
            'is_unique' => 'No Induk Siswa telah terdaftar',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Masukkan Nama Siswa',
        ]);

        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Masukkan Alamat Siswa',
        ]);
        
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim', [
            'required' => 'Masukkan Tanggal Lahir',
        ]);
        
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim', [
            'required' => 'Masukkan Tempat Lahir',
        ]);

        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required|trim', [
            'required' => 'Pilih salah satu jurusan',
        ]);

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[profil_siswa.email]', [
            'required'  => 'Masukkan Email Siswa',
            'is_unique' => 'Email telah terdaftar',
        ]);
        $this->form_validation->set_rules('no_telfon', 'No Telpon', 'required|trim', [
            'required' => 'Masukkan No Telpon Siswa',
        ]);

        $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'required|trim', [
            'required' => 'Masukkan Tahun Lulus Siswa',
        ]);
        //----------------------------------------------------------------------

        //-- Title Halaman
        $data['title'] = 'Halaman admin-Dashboard';
        //----------------------------
        $data['profil_siswa'] = $this->Siswa_model->tampilDataSiswa();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Template/admin/navbar', $data);
            $this->load->view('Template/admin/sidebar', $data);
            $this->load->view('admin/registrasi_siswa/index', $data);
            $this->load->view('Template/admin/footer',$data);
        } else {

            $nis = $this->input->post('nis');
            $upload = $this->Siswa_model->upload( $nis );
            if ($upload['result'] == 'success') {
                $this->Siswa_model->tambahDataSiswa($upload);
                $html = '<div class="alert alert-success">
                                <a href="siswa" class="close" data-dismiss="alert" >&times;</a>
                                <b>Pemberitahuan</b> <br>
                                Data siswa berhasil di tambah pada tanggal ' . date('d F Y H.i A') . '
                         </div>';
                $this->session->set_flashdata('msg', $html);
                redirect('admin/siswa', 'refresh');
            } else {
                echo $upload['error'];
            }
        }
    }

}

/* End of file profile.php */
