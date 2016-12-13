<?php

define('ROOT_PATH', realpath(__DIR__ . DIRECTORY_SEPARATOR . '..'));
define('APP_PATH', realpath(ROOT_PATH . DIRECTORY_SEPARATOR . 'app'));
define('CORE_PATH', realpath(ROOT_PATH . DIRECTORY_SEPARATOR . 'core'));
define('VENDOR_PATH', realpath(ROOT_PATH . DIRECTORY_SEPARATOR . 'vendor'));

//require_once('errorCode.php');
require_once(CORE_PATH . DIRECTORY_SEPARATOR . 'autoload.php');
//require_once(VENDOR_PATH . DIRECTORY_SEPARATOR . 'autoload.php');

return array(
            'route' => array(
                            'errorHandler' => 'app\\error\ErrorHandler',
                            ),
            );