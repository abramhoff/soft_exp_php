<?php

namespace src\controller;

use src\common\Common;

class Home{

    public function index()
    {
        Common::loadView('home');
    }

}