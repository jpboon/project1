<?php

class Wanted_model extends CI_Model {

    /**
     * Returns wanteds.
     *
     * @return array
     */
    public function getItems() {
        $array = array();
        $id = 0;
        $xmlstr = "";

        // select xml file
        if ($_SESSION['choice'] == "landelijk" || $_SESSION['province'] == "none") {
            $xmlstr = "http://www.politie.nl/rss/algemeen/ob/alle-gezochtberichten.xml";
        } else {
            $xmlstr = "http://www.politie.nl/rss/ob/provincies/" . $_SESSION['province'] . ".xml";
        }
        
        // load xml file
        $xml = simplexml_load_file($xmlstr);

        // loop through all items
        foreach ($xml->channel->item as $item) {
            //create wanted object 
            $wanted = new Wanted();

            // fill object with data
            $wanted->setTitle((string) $item->title);
            $wanted->setDescription((string) $item->description);
            $wanted->setPubdate((string) $item->pubDate);
            $wanted->setGeolat((string) $item->children('geo', true)->lat);
            $wanted->setGeolong((string) $item->children('geo', true)->long);
            $wanted->setId($id);
            $id+=1;

            foreach ($item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li as $bag) {

                $content = (string) $bag->children('content', true)->item->attributes('rdf', true)->about;
                $value = (string) $bag->children('content', true)->item->children('rdf', true)->value;

                switch ($content) {
                    case "omschrijving":
                        $wanted->setOmschrijving($value);
                        break;
                    case "zaaknummer":
                        $wanted->setZaaknummer($value);
                        break;
                    case "datum delict":
                        $wanted->setDatumdelict($value);
                        break;
                    case "plaats delict":
                        $wanted->setPlaatsdelict($value);
                        break;
                    case "signalement":
                        $wanted->setSignalement($value);
                        break;
                }
            }

            // create array with images
            $newImage = true;
            foreach ($item->children('media', true)->content as $media) {
                if ($media->attributes()->medium == "image") {
                    // check if image is already in array
                    foreach ($wanted->getImages() as $image) {
                        if ($image == (string) $media->attributes()->url) {
                            $newImage = false;
                            break;
                        }
                    }
                    if ($newImage) {
                        $wanted->setImages((string) $media->attributes()->url);
                    }
                } elseif ($media->attributes()->medium == "video") {
                    $wanted->setVideo((string) $media->attributes()->url);
                }
            }

            // add object to array
            $array[$id] = $wanted;
        }
        return $array;
    }
}
?>
