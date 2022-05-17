<?php

class AsilRouter 
{
	
    const default_controller = 'Home';
    const default_method = 'Index';
    const system_dir = 'App/Controller/';

    public function control ($name, $method, $parameter) {
        self::req(AsilRouter::system_dir.$name.'.php');
        if (method_exists('Control', $method)) {
            if (method_exists('Control', 'autoload')) call_user_func(array('Control', 'autoload'));
            return call_user_func(array('Control', $method), $parameter);
        }
        throw new NotFound($_GET['arg']);
    }

    public function param ($str, $limit = NULL) {
        return (
            $limit
                ? explode('/', rtrim($str, '/'), $limit)
                : explode('/', rtrim($str, '/'))
            );
    }

    public function req ($path) {
        if (is_readable($path)) return require_once($path);
        throw new NotFound($path);
    }

    public function run() {
        list($name, $method, $parameter) = (
            isset($_GET['arg'])
                ? self::param($_GET['arg'], 3) + array(self::default_controller, self::default_method, NULL)
                : array(self::default_controller, self::default_method, NULL)
        );
        return self::control($name, $method, $parameter);
    }

}

class AuthFail extends Exception {}
class UnexpectedError extends Exception {}
class NotFound extends Exception {}

try {
   AsilRouter::run();
}
catch (AuthFail $exception) {

    die('Auth failed');
}
catch (UnexpectedError $exception) {
    
    die('Error page');
}
catch (NotFound $exception) {
    die('404 not found');
}
