<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:05
 */


class SiteController
{
    public function search()
    {
//        $model = new SearchModel();
        $view = new SearchView();
        $this->render($view);
    }

    public function results()
    {
        $model = new ResultsModel();
        $list = $model->getSites();

        $view = new ResultsView();
        $this->render($view, ['list' => $list]);
    }

    private function render($view, $params=null)
    {
        $commonView = new CommonView();
        echo $commonView->output();
        echo $view->output($params);
    }
}