<?php

include "classes/message.php";

/**
 * Description of trace
 *
 * @author jharvard
 */
abstract class Trace extends Message {

    protected $zaaknummer;
    protected $omschrijving;
    protected $signalement;
    protected $images;

    public function __construct() {
        parent::__construct();
        $this->images = array();
        $this->zaaknummer = "";
        $this->omschrijving = "";
        $this->signalement = "";
    }

    public function getZaaknummer() {
        return $this->zaaknummer;
    }

    public function setZaaknummer($zaaknummer) {
        $this->zaaknummer = $zaaknummer;
    }
    
    public function getOmschrijving() {
        return $this->omschrijving;
    }

    public function setOmschrijving($omschrijving) {
        $this->omschrijving = $omschrijving;
    }
    
    public function getSignalement() {
        return $this->signalement;
    }

    public function setSignalement($signalement) {
        $this->signalement = $signalement;
    }
    
    public function getImages() {
        return $this->images;
    }

    public function setImages($images) {
        $this->images = $images;
    }
}

?>
