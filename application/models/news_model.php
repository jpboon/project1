<?php

class News_model extends CI_Model {

    /**
     * Returns news.
     *
     * @return array
     */
    public function getItems() {
        $array = array();
        $id = 0;
        $xmlstr = "";

        // select xml file
        if ($_SESSION['choice'] == "landelijk" || $_SESSION['province'] == "none") {
            $xmlstr = "http://www.politie.nl/rss/algemeen/nb/alle-nieuwsberichten.xml";
        } else {
            $xmlstr = "http://www.politie.nl/rss/nb/provincies/" . $_SESSION['province'] . ".xml";
        }

        // load xml file
        $xml = simplexml_load_file($xmlstr);

        // loop through all items
        foreach ($xml->channel->item as $item) {
            //create news object 
            $news = new News();

            // fill object with data
            $news->setTitle((string) $item->title);
            $news->setDescription((string) $item->description);
            $news->setPubdate((string) $item->pubDate);
            $news->setInfo((string) $item->children('content', true)->items->children('rdf', true)->Bag->children('rdf', true)->li->children('content', true)->item->children('rdf', true)->value);
            $news->setGeolat((string) $item->children('geo', true)->lat);
            $news->setGeolong((string) $item->children('geo', true)->long);
            $news->setId($id);
            $id+=1;

            // add object to array
            $array[$id] = $news;
        }
        return $array;
    }
}

?>
