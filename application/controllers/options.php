<?php

session_start();

class Options extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {    
        
        // save data to session from options view
        $_SESSION['choice'] = $_POST['choice'];
        $_SESSION['province'] = $_POST['province'];
    }
}

?>
