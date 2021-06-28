<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

    // proses Tampil Pegawai
    public function tampilDataPegawai()
    {  
        $this->db->select('profil_pegawai.*');
        return $this->db->get('profil_pegawai')->result();
    }

    // proses Get Data Pegawai
    public function getPegawai($id_pegawai){
        return $this->db->get_where('profil_pegawai',['id_pegawai'=>$id_pegawai])->row();
	}

    // proses Tambah Pegawai
    public function tambahDataPegawai(){
        $no_induk = $this->input->post('no_induk', true);
            $profile = [
                'username'  => $no_induk,
                'password'  => password_hash("bk".$no_induk, PASSWORD_DEFAULT),
                'level'     => "bk"
            ];
        
        $this->db->insert('profile', $profile);
        $last_id_profile = $this->db->insert_id();

        $informasi_pegawai =[
            'id_profile'            => $last_id_profile,
            'nama'                  => $this->input->post('nama', true),
            'email'                 => $this->input->post('email', true),
            'jenis_kelamin'         => $this->input->post('jenis_kelamin', true),
            'tanggal_lahir'         => $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          => $this->input->post('tempat_lahir', true),
            'no_telfon'             => $this->input->post('no_telfon', true),
            'alamat'                => $this->input->post('alamat', true),
            'no_induk'              => $no_induk,
        ];
        $this->db->insert('profil_pegawai', $informasi_pegawai);
    }

    // proses Edit Pegawai
    public function editDataPegawai( $id_pegawai ){
        
        // ambil detail informasi Pegawai
        $ambilInformasiPegawai = $this->getPegawai( $id_pegawai );
        
        $no_induk = $this->input->post('no_induk', true);

        // data profile
            $dataProfile = array    (
                'username'  => $no_induk,
            );

        // data informasi pegawai
        $dataInformationEmployee =[
            'nama'                  =>  $this->input->post('nama', true),
            'email'                 =>  $this->input->post('email', true),
            'jenis_kelamin'         =>  $this->input->post('jenis_kelamin', true),
            'tanggal_lahir'         =>  $this->input->post('tanggal_lahir', true),
            'tempat_lahir'          =>  $this->input->post('tempat_lahir', true),
            'no_telfon'             =>  $this->input->post('no_telfon', true),
            'alamat'                =>  $this->input->post('alamat', true),
            'no_induk'              =>  $no_induk,
		];


        // replace new session or update session username
        $this->session->set_userdata('sess_name', $this->input->post('nama'));
        $this->session->set_userdata('sess_alamat', $this->input->post('alamat'));
        $this->session->set_userdata('sess_email', $this->input->post('email'));
        $this->session->set_userdata('sess_telfon', $this->input->post('no_telfon'));

        // update profil_pegawai
        $this->db->where('id_pegawai', $id_pegawai);	
        $this->db->update('profil_pegawai', $dataInformationEmployee);

        // update profile
        $this->db->where('id_profile', $ambilInformasiPegawai->id_profile);	
        $this->db->update('profile', $dataProfile);
    }

    // porses hapus data Pegawai
    function prosesHapusPegawai( $id_profile ){

        $this->db->where('id_profile', $id_profile)->delete('profil_pegawai');
        $this->db->where('id_profile', $id_profile)->delete('profile');
    }

    // ubah kata sandi
    function doUpdatePassword() {

        $id_profile = $this->session->userdata('sess_id_profile');

        /** 
         *  To Do List
         *  1. Pengecekan password lama 
         *      -> Mengambil tabel profile berdasarkan id_profile (session)
         * 
         *  2. Jika password lama valid ? 
         *      -> Iya lanjut pengubahan 
         *      -> Tidak ? tampilkan pesan password lama tidak sama (step 3)
         *  3. Kembali ke halaman ubah password ( + flashdata)
        */

        // inisialisasi variable old dan new 
        $oldPassword = $this->input->post('old_password');
        $newPassword = $this->input->post('new_password');

        // @TODO 1 : Pengecekan password 
        $this->db->where('id_profile', $id_profile);
        $ambilDataProfileById = $this->db->get('profile')->row_array();

        // @TODO 2 : Pengecekan password lama 
        if ( password_verify( $oldPassword, $ambilDataProfileById['password'] ) ) {

            // @TODO 2.1 : Lanjut pengubahan
            $data = array(

                'password'  => password_hash($newPassword, PASSWORD_DEFAULT)
            );
            $this->db->where('id_profile', $id_profile);
            $this->db->update('profile', $data);

            // element html
            $html = '<div class="alert alert-success">Pemberitahuan <br> Kata sandi berhasil diperbarui pada '.date('d F Y H.i A').'</div>';

            
        } else {

            // element html
            $html = '<div class="alert alert-warning">Pemberitahuan <br> Kata sandi lama yang anda masukkan salah, dimohon untuk memasukkan kembali</div>';                        
        }


        // @TODO 3: Set session flashdata
        $this->session->set_flashdata('msg', $html);    

        

        // redirect 
        redirect('admin/pegawai/password');
        
    }

    function doUpdatePasswordBk() {

        $id_profile = $this->session->userdata('sess_id_profile');

        /** 
         *  To Do List
         *  1. Pengecekan password lama 
         *      -> Mengambil tabel profile berdasarkan id_profile (session)
         * 
         *  2. Jika password lama valid ? 
         *      -> Iya lanjut pengubahan 
         *      -> Tidak ? tampilkan pesan password lama tidak sama (step 3)
         *  3. Kembali ke halaman ubah password ( + flashdata)
        */

        // inisialisasi variable old dan new 
        $oldPassword = $this->input->post('old_password');
        $newPassword = $this->input->post('new_password');

        // @TODO 1 : Pengecekan password 
        $this->db->where('id_profile', $id_profile);
        $ambilDataProfileById = $this->db->get('profile')->row_array();

        // @TODO 2 : Pengecekan password lama 
        if ( password_verify( $oldPassword, $ambilDataProfileById['password'] ) ) {

            // @TODO 2.1 : Lanjut pengubahan
            $data = array(

                'password'  => password_hash($newPassword, PASSWORD_DEFAULT)
            );
            $this->db->where('id_profile', $id_profile);
            $this->db->update('profile', $data);

            // element html
            $html = '<div class="alert alert-success">Pemberitahuan <br> Kata sandi berhasil diperbarui pada '.date('d F Y H.i A').'</div>';

            
        } else {

            // element html
            $html = '<div class="alert alert-warning">Pemberitahuan <br> Kata sandi lama yang anda masukkan salah, dimohon untuk memasukkan kembali</div>';                        
        }


        // @TODO 3: Set session flashdata
        $this->session->set_flashdata('msg', $html);    

        // redirect 
        redirect('bk/pegawai/password/');
        
    }
    
}

/* End of file Pegawai.php */
?>