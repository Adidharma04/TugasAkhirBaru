<?php 

    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Forum_diskusi_model extends CI_Model {
        

        // ambil data topik
        function getDataTopic() {

            return $this->db->get('forum_topik');
        }

        public function getForum($id_forum){
            return $this->db->get_where('forum',['id_forum'=>$id_forum])->row();
        }


        function getDataForum( $id_forum = null ) {

            $SQL = "SELECT forum_topik.*, forum.*, profile.username FROM forum
                    JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
                    JOIN profile ON profile.id_profile = forum.id_profile ";
            return $this->db->query( $SQL );
        }



        function getDataForumById( $id_forum ) {

            $SQL = "SELECT forum_topik.*, forum.*, profile.username FROM forum
                JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
                JOIN profile ON profile.id_profile = forum.id_profile WHERE id_forum = '$id_forum'";


            return $this->db->query( $SQL )->row();
        }

        function getDataForumDetail( $id_forum ) {

            // $SQL = "SELECT forum_topik.*, forum.*, forum_detail.*, profile.username FROM forum_detail
                
            //     JOIN forum ON forum.id_forum = forum_detail.id_forum
            //     JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
            //     JOIN profile ON profile.id_profile = forum_detail.id_profile WHERE forum.id_forum = '$id_forum'";


            // return $this->db->query( $SQL );


            /**
             *  A. Tampilkan Forum Detail
             */
            $sqlForumDetail = "SELECT forum_topik.*, forum.*, forum_detail.*, profile.username, profile.level FROM forum_detail
                
            JOIN forum ON forum.id_forum = forum_detail.id_forum
            JOIN forum_topik ON forum_topik.id_topik = forum.id_topik
            JOIN profile ON profile.id_profile = forum_detail.id_profile WHERE forum.id_forum = '$id_forum'";

            $tampilkanForumDetail = $this->db->query( $sqlForumDetail ); 


            // siapkan tempat atau objek 
            $tampungNilai = array();

            // cek data 
            if ( $tampilkanForumDetail->num_rows() > 0 ) {

                foreach ( $tampilkanForumDetail->result_array() AS $row ) {


                    $id_profile = $row['id_profile'];
                    /**
                     *  
                     *  B. Mengecek level
                     */
                    if ( ($row['level'] == "siswa") || $row['level'] == "alumni" ) {

                        // karena level = siswa maka dihubungkan dengan 
                        $sql = "SELECT forum_detail.*, profile.*, profil_siswa.*  FROM forum_detail
                                JOIN profile ON forum_detail.id_profile = profile.id_profile
                                JOIN profil_siswa ON profil_siswa.id_profile = profile.id_profile 
                                WHERE profile.id_profile = '$id_profile'";
                        $info_detail = $this->db->query( $sql )->row_array();

                        /** C. Tampung Nilai */
                        array_push( $tampungNilai, array(

                            'id_forum' => $row['id_forum'],
                            'id_detail_forum' => $row['id_detail_forum'],
                            'nama'            => $info_detail['nama'],
                            'username'      => $info_detail['username'],
                            'notes'         => $row['notes'],
                            'created_at'    => $row['created_at']
                        ) );
                        
                    } else if ( $row['level'] == "staff" || $row['level'] == "bk" ) {

                        $sql = "SELECT forum_detail.*, profile.*, profil_pegawai.* FROM forum_detail 
                                JOIN profile ON forum_detail.id_profile = profile.id_profile 
                                JOIN profil_pegawai ON profil_pegawai.id_profile = profile.id_profile 
                                WHERE profile.id_profile = '$id_profile'";

                        $info_detail = $this->db->query( $sql )->row_array();

                        /** C. Tampung Nilai */
                        array_push( $tampungNilai, array(

                            'id_forum' => $row['id_forum'],
                            'id_detail_forum' => $row['id_detail_forum'],
                            'nama'            => $info_detail['nama'],
                            'username'      => $info_detail['username'],
                            'notes'         => $row['notes'],
                            'created_at'    => $row['created_at']
                        ) );
                    }
                }
            }
            // return D
            return $tampungNilai;
        }

        // proses tambah topik
        function onInsertDataTopic() {

            $data = array(

                'nama'  => $this->input->post('topik')
            );
            $this->db->insert('forum_topik', $data);


            $html = '<div class="alert alert-success">Pemberitahuan <br> Topik '.$data['nama'].' berhasil terbuat</div>';
            $this->session->set_flashdata('msg', $html);

            // redirect
            redirect('admin/Forum_diskusi');
        }

        // Khusus Forum-----------------------------------------------------------------------------------------
        
        // Upload topik
        public function upload(){    
            $config['upload_path'] = './assets/Gambar/Upload/Forum/';    
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
    
            if ( empty( $_FILES['foto']['name'] ) ) {
    
                return array('result' => 'success', 'file' => ['file_name' => ""]);
            } else {
    
                if($this->upload->do_upload('foto')){
                    $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                    return $return;
                }else{    
                    $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());return $return;   
                }  
            }
        }

        // proses tambah Data Forum
        function tambahDataForum($upload) {

            $id_profile = $this->session->userdata('sess_id_profile');

            $forum = array(
                'id_profile'        => $id_profile,
                'id_topik'          => $this->input->post('id_topik'),
                'nama_forum'        => $this->input->post('nama_forum'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'tanggal_forum'     => $this->input->post('tanggal_forum'),
                'foto'              => $upload['file']['file_name'],
                
            );
            $this->db->insert('forum', $forum);
        }

        // proses Edit Data Forum
        function editDataForum($upload) {

            $id_forum   = $this->input->post('id_forum');
            $id_profile = $this->session->userdata('sess_id_profile');
            
            // ambil detail informasi event
            $ambilInformasiForum = $this->getForum( $id_forum );

            // upload foto
            $config['upload_path'] = './assets/Gambar/Upload/Forum/';    
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            $foto = "";
            // apabila dia ingin mengubah gambar 
            if ( !empty( $_FILES['foto']['name'] ) ) {


                if ( $this->upload->do_upload('foto') ){

                    if ( $ambilInformasiForum->foto ) { 
                        // remove old photo
                        $link = $config['upload_path']. $ambilInformasiForum->foto;
                        unlink( $link );
                    }

                    // set value new photo
                    $foto = $this->upload->data('file_name');
                    
                }else{    
                    
                    // upload error
                    $html = '<div class="alert alert-warning"><b>Pemberitahuan</b> '.$this->upload->display_errors().'</div>';
                    $this->session->set_flashdata('msg', $html);

                    redirect('admin/forum/edit/'. $id_forum);
                }  

            // gaambar tetap alias tidak diubah sama sekali
            } else {

                if ( $ambilInformasiForum->foto ) {

                    $foto = $ambilInformasiForum->foto;
                }
            }

            $forum = array(
                'id_profile'        => $id_profile,
                'id_topik'          => $this->input->post('id_topik'),
                'nama_forum'        => $this->input->post('nama_forum'),
                'deskripsi'         => $this->input->post('deskripsi'),
                'tanggal_forum'     => $this->input->post('tanggal_forum'),
                'foto'              => $foto,
                
            );
            $this->db->where('id_forum', $id_forum);
            $this->db->update('forum', $forum);
        }

        // porses hapus
        function prosesHapusForum( $id_forum ){
            $ambilInformasiForum = $this->getForum( $id_forum );

            $config['upload_path'] = './assets/Gambar/Upload/Forum/';    
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ( $ambilInformasiForum->foto ) { 
                // remove old photo
                $link = $config['upload_path']. $ambilInformasiForum->foto;
                unlink( $link );
        }
            $this->db->where('id_forum', $id_forum)->delete('forum');
            $this->db->where('id_forum', $id_forum)->delete('forum_detail');
        }
        
        // Khusus Forum-----------------------------------------------------------------------------------------

        
        // Khusus Detail Forum-----------------------------------------------------------------------------------------

        // proses tambah Data Detail Forum
        function tambahDataDetailForum() {
            $id_profile = $this->session->userdata('sess_id_profile');

            $forumDetail = array(
                'id_profile'        => $id_profile,
                'id_forum'          => $this->input->post('id_forum'),
                'notes'             => $this->input->post('notes'),
                
            );
            $this->db->insert('forum_detail', $forumDetail);
        }

        // proses tambah Data Detail Forum
        function editDataDetailForum($id_detail_forum) {

            $forumDetail = array(
                'notes'             => $this->input->post('notes'),
            );
            $this->db->where('id_detail_forum', $id_detail_forum)->update('forum_detail', $forumDetail);
        }
        

        // porses hapus Data Detail Forum
        function prosesHapusDetailForum( $id_detail_forum ){
            $this->db->where('id_detail_forum', $id_detail_forum)->delete('forum_detail');
        }
    }
    
    /* End of file Forum_diskusi_model.php */
    