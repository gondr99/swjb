<?php

namespace Gondr\Controller;

use Gondr\Core\DB;

class MainController extends MasterController
{
    public function index()
    {
        $db = new DB();
        $sql = "SELECT * FROM boards ORDER BY date DESC LIMIT 0, 6";
        $list = $db->fetchAll($sql, []);
        
        $this->view("main", ["list" => $list]);
    }

    public function registerPage()
    {
        $this->view("register");
    }
}