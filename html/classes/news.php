<?php

include "classes/message.php";

/**
 * Description of news
 *
 * @author jharvard
 */
class News extends Message {
    protected $info;
    
    public function __construct() {
        parent::__construct();
        $this->info = "";
    }
    
    public function getInfo() {
        return $this->info;
    }
    
    public function setInfo($info) {
        $this->info = $info;
    }
    

}

?>
