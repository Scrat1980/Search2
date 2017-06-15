<?php

/**
 * Created by PhpStorm.
 * User: root
 * Date: 14.06.17
 * Time: 15:49
 */
class ResultsModel
{
    public function getSites()
    {
        $db = new Db();
        $sitesQuery = "SELECT DISTINCT site FROM searches";
        $sites = $db->query($sitesQuery);
        $resultsList = [];

        foreach ($sites as $site) {
            $oneSite = $site['site'];
            $numberOfElementsQuery =
                "SELECT site, number_of_elements, id
              FROM searches
              WHERE site = '$oneSite' ORDER BY id DESC
              LIMIT 1";

            $resultsList[] = $db->query($numberOfElementsQuery);
        }

        return $resultsList;
    }

}