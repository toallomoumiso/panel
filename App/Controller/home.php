<?php

class Control {
	
    private function __construct () {}
    public function autoload () { //
        echo "<pre>index autoload\n";
    }
    public function Index () {
        
        echo "Ana index";
    }

}