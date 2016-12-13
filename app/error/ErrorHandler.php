<?php

namespace app\error;

class ErrorHandler
{
    public function __construct($errorCode)
    {    
        switch($errorCode)
        {
            case 404:
                echo '404 Not Found';
                return;
            default:
                echo 'error code is not correct!';
                return;
        }
    }
    
    
}