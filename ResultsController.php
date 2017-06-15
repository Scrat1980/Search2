<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.06.17
 * Time: 3:29
 */
class ResultsController
{
    public function details()
    {
        $recordId = isset($_GET['id'])
            ? $_GET['id']
            : null;

        if(is_null($recordId)) {
            throw new Exception('Record id not set');
        }

        $results = new ResultsModel();
        $elements = $results->getElementsById($recordId);
        foreach ($elements as $element) {
            echo $element[0];
        }
    }


}