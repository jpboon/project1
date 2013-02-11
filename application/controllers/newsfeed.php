<?php

include "classes/news.php";
session_start();

class Newsfeed extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->model('News_model');
        $items = $this->News_model->getItems();

        // save array to session
        $_SESSION['news'] = serialize($items);

        $this->load->view('temp_view/header', array('title' => 'Nieuws'));
        $this->load->view('data_view/newslist', array('items' => $items));
        $this->load->view('temp_view/footer');
    }

    public function newsitem($id) {
        // load array from session
        $items = unserialize($_SESSION['news']);
        $item = new News();
        foreach ($items as $x) {
            if ($x->getId() == $id) {
                $item = $x;
            }
        }

        $this->load->view('temp_view/header', array('title' => 'Nieuws'));
        $this->load->view('data_view/newsitem', array('item' => $item));
        $this->load->view('temp_view/footer');
    }
}

?>
