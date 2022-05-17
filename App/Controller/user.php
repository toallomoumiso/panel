<?php

class Control {
	
    private function __construct () {}
	
    public function autoload () { // Executed every time home is loaded
        echo "<pre>en üst\n";
    }
    public function Index () {
        
        echo "indexi";
    }

}