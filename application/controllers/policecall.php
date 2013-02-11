<?php

class Policecall extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->view('temp_view/header', array('title' => 'Bellen'));
        $this->load->view('call_view/calls');
        $this->load->view('temp_view/footer');
    }
}

?>
