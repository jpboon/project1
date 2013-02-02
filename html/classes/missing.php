<?php

include "classes/trace.php";

/**
 * Description of missing
 *
 * @author jharvard
 */
class Missing extends Trace {

    protected $vermistsinds;
    protected $laatstgezienin;
    
    public function __construct() {
        parent::__construct();
        $this->vermistsinds = "";
        $this->laatstgezienin = "";        
    }
    
    public function getVermistsinds() {
        return $this->vermistsinds;
    }

    public function setVermistsinds($vermistsinds) {
        $output = "";
        // change value from 'Tue Jan 29 00:00:00 CET 2013' to 'Tue, 29 Jan 2013'
        if(strlen($vermistsinds) == 28) {
            $output = substr($vermistsinds,0 ,3);
            $output .= ", ";
            $output .= substr($vermistsinds,8 ,3);
            $output .= substr($vermistsinds,4 ,4);
            $output .= substr($vermistsinds,24 ,4);
        }
        $this->vermistsinds = $output;
    }
    
    public function getLaatstgezienin() {
        return $this->laatstgezienin;
    }

    public function setLaatstgezienin($laatstgezienin) {
        $this->laatstgezienin = $laatstgezienin;
    }
    
}

?>
