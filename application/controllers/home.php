<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
   
    public function index() { 

        $this->load->view('temp_view/header', array('title' => 'Project 1'));
        $this->load->view('home_view/default');
        $this->load->view('temp_view/footer');
            
    }  
}
