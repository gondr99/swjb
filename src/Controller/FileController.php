<?php

namespace Gondr\Controller;

use Gondr\Core\Lib;

class FileController extends MasterController
{
    public function uploadPage()
    {
        $this->view("upload");
    }

    public function uploadProcess()
    {
        $tmpName = $_FILES["upload"]["tmp_name"];
        $realName = $_FILES["upload"]["name"];

        $user = user();
        $filePath = __DATA . "/" . $user->userid;
        if(!file_exists($filePath)){
            mkdir($filePath);
        }

        move_uploaded_file($tmpName, $filePath . "/" . $realName);
        Lib::MsgAndGo("업로드 성공", "/list");

    }

    public function listPage()
    {
        $path = __DATA . "/" . user()->userid;
        if(!file_exists($path)){
            mkdir($path);
        }

        $fileList = scandir($path, SCANDIR_SORT_ASCENDING);
        array_splice($fileList, 0, 2);
        //var_dump(json_encode( $fileList, JSON_UNESCAPED_UNICODE));

        $this->view("list", ['list'=>$fileList]);
    }
}