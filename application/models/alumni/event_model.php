<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

    public function tampilDataEvent(){
        $id_profile = $this->session->userdata('sess_id_profile');
        
        $where = ['id_profile' => $id_profile];
        return $this->db->get_where('event', $where);
    }
    public function tambahDataEvent($upload){

        $id_profile = $this->session->userdata('sess_id_profile');

        $event =[
            'id_profile'            => $id_profile,
            'nama_event'            => $this->input->post('nama_event', true),
            'deskripsi_event'       => $this->input->post('deskripsi_event', true),
            'tanggal_event'         => $this->input->post('tanggal_event', true),
            'foto'                  => $upload['file']['file_name'],
            'lokasi'                => $this->input->post('lokasi', true),
            'jenis_event'           => $this->input->post('jenis_event', true),
            'status'                => "pending",
            
        ];
        // query untuk melakukan pengecekan
        $where = ['id_profile' => $id_profile];
        $dataEvent = $this->db->get_where('event', $where);
        
        if ( $dataEvent->num_rows() == 1 ) {
            // do update data
            $this->db->where( $where );
            $this->db->insert('event', $event);
        } else {
            $this->db->insert('event', $event);
        }

    }
    public function upload(){    
        $config['upload_path'] = './assets/Gambar/Upload/Event/';    
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

}

/* End of file Event_model.php */
?> 