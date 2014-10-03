<?php

namespace App\Controller;
use System;

class errorController extends System\HttpFrontController
{
    public function error404Action()
    {
        echo '404 not found';
        exit;
    }
    
    public function error500Action()
    {
        echo '500 server internal error';
        exit;
    }
}

