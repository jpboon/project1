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
        
        //id for object array
        $id = 0;

        // load xml file
        $xml = simplexml_load_file('http://www.politie.nl/rss/algemeen/vp/alle-vermiste-personen.xml');

        // loop through all items
        foreach ($xml->channel->item as $item) {
            //create missing object 
            $missing = new Missing();

            // fill object with data
            $missing->setTitle((string) $item->title);
            $missing->setDescription((string) $item->description);
            $missing->setPubdate((string) $item->pubDate);
            $missing->setGeolat((string) $item->children('geo', true)->lat);
            $missing->setGeolong((string) $item->children('geo', true)->long);
            $missing->setId($id);
            $id+=1;
            
            foreach ($item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li as $bag) {
                
                $content = (string) $bag->children('content', true)->item->attributes('rdf', true)->about;
                $value = (string) $bag->children('content', true)->item->children('rdf', true)->value;
                
                switch ($content) {
                    case "omschrijving":
                        $missing->setOmschrijving($value);
                        break;
                    case "zaaknummer":
                        $missing->setZaaknummer($value);
                        break;
                    case "vermist sinds":
                        $missing->setVermistsinds($value);
                        break;
                    case "laatst gezien in":
                        $missing->setLaatstgezienin($value);
                        break;
                    case "signalement":
                        $missing->setSignalement($value);
                        break;
                }
            }
            
            // create array with images
            $newImage = true;
            foreach($item->children('media', true)->content as $media) {
                if($media->attributes()->medium == "image") {
                    // check if image is already in array
                    foreach ($missing->getImages() as $image) {
                        if($image == (string)$media->attributes()->url) {
                            $newImage = false;
                            break;
                        }
                    }
                    if($newImage) {
                        $missing->setImages((string)$media->attributes()->url);
                    }
                }
            }
            
            // add object to array
            $this->array[$id] = $missing;
        }
        return $this->array;
    }
}

?>
