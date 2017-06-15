<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:08
 */

class ResultsView
{
    public function output($params)
    {
        $list = $params['list'];

        $view =
            "<p><a href='/index.php?page=search'>"
            . 'Поиск'
            . "</a></p>"
            . "<table><tbody>
                <tr>
                    <td>Сайт</td>
                    <td>Результат</td>
                </tr>
                <tr>";

        foreach ($list as $item) {
            foreach ($item as $site) {
                $view .=
                    "<tr>
                        <td>$site[0]</td>
                        <td><a href='' data-id='$site[2]' class='result'>
                        $site[1]</a></td>
                    </tr>";
            }
        }

        $view .=    "</tr>
            </tbody></table>";

        $view .= "<p id='detailsContainer' ></p>";


        return $view;
    }
}