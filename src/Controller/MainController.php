<?php

namespace Gondr\Controller;

use Gondr\Core\DB;

class MainController extends MasterController
{
    public function index()
    {

        $this->view("main", []);
    }


}