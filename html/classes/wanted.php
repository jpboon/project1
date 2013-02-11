<?php

include "classes/trace.php";

/**
 * Description of missing
 *
 * @author jharvard
 */
class Wanted extends Trace {

    protected $datumdelict;
    protected $plaatsdelict;
    protected $video;

    public function __construct() {
        parent::__construct();
        $this->datumdelict = "";
        $this->laatstgezienin = "";
    }

    public function getDatumdelict() {
        return $this->datumdelict;
    }

    public function setDatumdelict($datumdelict) {
        $output = "";
        // change value from 'Tue Jan 29 00:00:00 CET 2013' to 'Tue, 29 Jan 2013'
        if (strlen($datumdelict) == 28) {
            $output = substr($datumdelict, 0, 3);
            $output .= ", ";
            $output .= substr($datumdelict, 8, 3);
            $output .= substr($datumdelict, 4, 4);
            $output .= substr($datumdelict, 24, 4);
        }
        $this->datumdelict = $output;
    }

    public function getPlaatsdelict() {
        return $this->plaatsdelict;
    }

    public function setPlaatsdelict($plaatsdelict) {
        $this->plaatsdelict = $plaatsdelict;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

}

?>
