<?php

namespace app\testModule;

class Services extends \core\Container implements \core\IServices
{
    public function __construct()
    {
        $config = require_once 'Config.php';

        $this->db = function () use (&$config) {
            $db = new \core\mysql\DBQuery($config['db']);
            if (!$db->success()) {
                trigger_error('connect db failed...'.$db->error(), E_USER_WARNING);
                throw new \Exception($db->error());
            }
            return $db;
        };

        $this->session = function () use (&$config) {
            session_set_cookie_params(0, '/', $config['session']['cookieDomain']);
            return new \core\Session();
        };
    }
    
    public function run($uriAry)
    {
        $appClass = __NAMESPACE__.'\\controller\\'.$uriAry[1];
        $controllerObject = new $appClass($uriAry, $this);
        $controllerObject->{$uriAry[2] . "Action"}();
    }
}

