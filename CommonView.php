<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:08
 */

class CommonView
{
    private $script = "<script src='main.js'></script>";

    private $jquery = "<script src='jquery-3.2.1.min.js'></script>";

    public function output()
    {
        return
            "<p></p>"
            . $this->jquery
            . $this->script;
    }
}