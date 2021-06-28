<?php 


    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Main extends CI_Controller {
    
        public function index(){
            
            redirect('user/dashboard_user');
        }
    
    }
    
    /* End of file Main.php */
    