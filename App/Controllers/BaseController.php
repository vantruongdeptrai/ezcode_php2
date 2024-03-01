<?php

namespace App\Controllers;

use eftec\bladeone\BladeOne;

class BaseController
{
    protected function render($views,$data=[])
    {
        $viewsDir = './App/Views/Admin';
        $storageDir = './storage';
        $blade = new BladeOne($viewsDir, $storageDir, BladeOne::MODE_DEBUG); // MODE_DEBUG allows to pinpoint troubles.
        echo $blade->run($views,$data); // it calls /views/hello.blade.php
    }
}