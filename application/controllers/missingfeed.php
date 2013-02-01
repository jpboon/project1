<?php

include "classes/missing.php";
session_start();

class Missingfeed extends CI_Controller {

    public $array = array();

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $items = $this->getItems();

        // save array to session
        $_SESSION['missings'] = serialize($items);

        $this->load->view('temp_view/header', array('title' => 'Vermisten'));
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

        $this->load->view('temp_view/header', array('title' => 'Vermiste'));
        $this->load->view('data_view/missingitem', array('item' => $item));
        $this->load->view('temp_view/footer');
    }

    private function getItems() {
        $id = 0;

        // load xml file
        $xml = simplexml_load_file('http://www.politie.nl/rss/algemeen/vp/alle-vermiste-personen.xml');

        // loop through all items
        foreach ($xml->channel->item as $item) {
            //create news object 
            $missing = new Missing();

            // fill object with data
            $missing->setTitle((string) $item->title);
            $missing->setDescription((string) $item->description);
            $missing->setPubdate((string) $item->pubDate);
            $missing->setGeolat((string) $item->children('geo', true)->lat);
            $missing->setGeolong((string) $item->children('geo', true)->long);


            //       foreach ($item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li as $bag) {
            //           if ((string)$bag->children('content', true)->item['rdf:about'] == "zaaknummer") {
            //               $missing->setZaaknummer($bag->children('content', true)->item->children('rdf', true)->value);
            //               $missing->setOmschrijving("in de if");                   
            //           }
            //       }


            foreach ($item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li as $bag) {
                $content = (string) $item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item->attributes('rdf', true)->about;
                if ($content == "omschrijving") {
                    $missing->setOmschrijving((string) $item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item->children('rdf', true)->value);
                    //$missing->setOmschrijving((string) $bag->children('content', true)->item->children('rdf', true)->value);
                }
            }
            //$missing->setOmschrijving($item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item['rdf:about']->children('rdf', true)->value);
            // $missing->getZaaknummer();
            // $missing->getOmschrijving();
            // $missing->getVermistsinds();
            // $missing->getLaatstgezienin();
            // $missing->getSignalement();
            // for each image....
            // $missing->getImages();

            $missing->setId($id);
            $id+=1;


// $missing->setInfo((string)$item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item->children('rdf', true)->value);
            // add object to array
            $this->array[$id] = $missing;
        }

        return $this->array;
    }

}

?>
