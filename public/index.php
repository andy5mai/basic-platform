<?php 

try {
    $config = require_once(__DIR__.'/../config/BasicConfig.php');

    $app = new \core\App($config);
    $app->run();
} catch (\Exception $e) {
    // die($e->getMessage());
}