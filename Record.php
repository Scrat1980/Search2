<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 14.06.17
 * Time: 14:15
 */
class Record
{
    public $site;
    public $elements;
    public $number_of_elements;

    public function __construct($site, $elements, $number)
    {
        $this->site = $site;
        $this->elements = $elements;
        $this->number_of_elements = $number;
    }
}