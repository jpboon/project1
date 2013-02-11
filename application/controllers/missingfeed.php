<?php

include "classes/missing.php";
session_start();

class Missingfeed extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('Missing_model');
        $items = $this->Missing_model->getItems();

        // save array to session
        $_SESSION['missings'] = serialize($items);

        $this->load->view('temp_view/header', array('title' => 'Vermist'));
        $this->load->view('data_view/missinglist', array('items' => $items));
        $this->load->view('temp_view/footer');
    }

    public function missingitem($id) {
        // load array from session
        $items = unserialize($_SESSION['missings']);
        $item = new Missing();
        foreach ($items as $x) {
            if ($x->getId() == $id) {
                $item = $x;
            }
        }

        $this->load->view('temp_view/header', array('title' => 'Vermist'));
        $this->load->view('data_view/missingitem', array('item' => $item));
        $this->load->view('temp_view/footer');
    }
}

?>
