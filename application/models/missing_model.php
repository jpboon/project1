<?php

class Missing_model extends CI_Model {

    /**
     * Returns missings.
     *
     * @return array
     */
    public function getItems() {
        $array = array();
        $id = 0;
        $xmlstr = "";

        // select xml file
        if ($_SESSION['choice'] == "landelijk" || $_SESSION['province'] == "none") {
            $xmlstr = "http://www.politie.nl/rss/algemeen/vp/alle-vermiste-personen.xml";
        } else {
            $xmlstr = "http://www.politie.nl/rss/vp/provincies/" . $_SESSION['province'] . ".xml";
        }

        // load xml file
        $xml = simplexml_load_file($xmlstr);

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
            $array[$id] = $missing;
        }
        return $array;
    }
}
?>
