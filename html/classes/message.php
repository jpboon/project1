<?php

/**
 * Description of message
 *
 * @author jharvard
 */
abstract class Message {

    protected $id;
    protected $title;
    protected $description;
    protected $pubdate;
    protected $geolat;
    protected $geolong;

    public function __construct() {
        $this->id = "";
        $this->title = "";
        $this->description = "";
        $this->pubdate = "";
        $this->geolat = "";
        $this->geolong = "";
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPubdate() {
        return $this->pubdate;
    }

    public function setPubdate($pubdate) {
        $this->pubdate = $pubdate;
    }

    public function getGeolat() {
        return $this->geolat;
    }

    public function setGeolat($geolat) {
        $this->geolat = $geolat;
    }

    public function getGeolong() {
        return $this->geolong;
    }

    public function setGeolong($geolong) {
        $this->geolong = $geolong;
    }

}

?>
