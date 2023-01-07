<?php

namespace Gondr\Controller;

use Gondr\Core\DB;
use Gondr\Core\Lib;

class UserController extends MasterController
{
    public function registerPage()
    {
        $this->view("register");
    }

    public function registerProcess()
    {
        if(!isset($_POST['userid']) || !isset($_POST['userPass'])){
            Lib::MsgAndBack("유저아이디나 패스워드가 없습니다.");
            return;
        }
        $id = $_POST['userid'];
        $pass = $_POST['userPass'];

        $user = DB::fetch("SELECT * FROM users WHERE userid = ?", [$id]);

        if($user) {
            Lib::MsgAndBack("해당 아이디가 이미 존재합니다.");
            return;
        }

        $result = DB::execute(
            "INSERT INTO users (`userid`, `password`) VALUES (?, PASSWORD(?))",
            [$id, $pass]);

        if($result) {
            Lib::MsgAndGo("성공적으로 회원가입", "/");
            return;
        }

        Lib::MsgAndBack("오류 발생");
    }

    public function loginPage()
    {
        $this->view("login");
    }

    public function loginProcess()
    {
        if(!isset($_POST['userid']) || !isset($_POST['userPass'])){
            Lib::MsgAndBack("유저아이디나 패스워드가 없습니다.");
            return;
        }
        $id = $_POST['userid'];
        $pass = $_POST['userPass'];

        $user = DB::fetch(
            "SELECT * FROM users WHERE userid = ? AND password = PASSWORD(?)",
            [$id, $pass]
        );

        if(!$user){
            Lib::MsgAndBack("아이디 또는 비밀번호 오류");
            return;
        }

        $_SESSION['user'] = $user;
        Lib::MsgAndGo("로그인 완료", "/");
    }
}