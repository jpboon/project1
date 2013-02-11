<?php

include "classes/wanted.php";
session_start();

class Wantedfeed extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('Wanted_model');
        $items = $this->Wanted_model->getItems();

        // save array to session
        $_SESSION['wanted'] = serialize($items);

        $this->load->view('temp_view/header', array('title' => 'Gezocht'));
        $this->load->view('data_view/wantedlist', array('items' => $items));
        $this->load->view('temp_view/footer');
    }

    public function wanteditem($id) {
        // load array from session
        $items = unserialize($_SESSION['wanted']);
        $item = new Wanted();
        foreach ($items as $x) {
            if ($x->getId() == $id) {
                $item = $x;
            }
        }

        $this->load->view('temp_view/header', array('title' => 'Gezocht'));
        $this->load->view('data_view/wanteditem', array('item' => $item));
        $this->load->view('temp_view/footer');
    }
}

?>
