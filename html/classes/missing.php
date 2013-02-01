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
        $this->vermistsinds = $vermistsinds;
    }
    
    public function getLaatstgezienin() {
        return $this->laatstgezienin;
    }

    public function setLaatstgezienin($laatstgezienin) {
        $this->laatstgezienin = $laatstgezienin;
    }
    
}

?>
