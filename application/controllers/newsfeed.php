<?php

include "classes/news.php";
session_start();


class Newsfeed extends CI_Controller {

    public $array = array();

    function __construct() {
        parent::__construct();
    }


    public function index() {

        $items = $this->getItems();
        
        // save array to session
        $_SESSION['items'] = serialize($items);
   
        $this->load->view('temp_view/header', array('title' => 'Nieuws'));
        $this->load->view('data_view/newsdata', array('items' => $items));
        $this->load->view('temp_view/footer');
    }

    public function newsitem($id) {
        $items = unserialize($_SESSION['items']);
        $item = new News();
        foreach ($items as $x) {
            if($x->getId() == $id){
                $item = $x;
            }
        }
        
        $this->load->view('temp_view/header', array('title' => 'Nieuws'));
        $this->load->view('data_view/newsitem', array('item' => $item));
        $this->load->view('temp_view/footer');
    }

    public function getItems() {
        $id = 0;

        // load xml file
        $xml = simplexml_load_file('http://www.politie.nl/rss/algemeen/nb/alle-nieuwsberichten.xml');

        // loop through all items
        foreach ($xml->channel->item as $item) {
            //create news object 
            $news = new News();

            // fill object with data
            $news->setTitle((string)$item->title);
            $news->setDescription((string)$item->description);
            $news->setPubdate((string)$item->pubDate);
            $news->setInfo((string)$item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item->children('rdf', true)->value);
            $news->setGeolat((string)$item->children('geo', true)->lat);
            $news->setGeolong((string)$item->children('geo', true)->long);
            $news->setId($id);
            $id+=1;
            
            // add object to array
            $this->array[$id] = $news;
            
        }
        
        return $this->array;
    }

}

?>
