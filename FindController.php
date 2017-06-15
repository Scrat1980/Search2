<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:05
 */


class FindController
{
    private $site;
    private $type;
    private $text;
    private $status = 'Данные успешно обработаны';

    public function index()
    {
        $this->site = isset($_GET['site'])
            ? $_GET['site']
            : null;
        $this->type = isset($_GET['type'])
            ? $_GET['type']
            : null;
        $this->text = isset($_GET['text'])
            ? $_GET['text']
            : null;

        if(!$this->validates()) {
            $this->status = 'Не прошли валидацию';
            echo $this->status;
            return;
        }
        
        $model = new FindModel();
        $resultCorrect = $model->getDataFromSite(
            $this->site,
            $this->type,
            $this->text
        );

        if(! $resultCorrect) {
            $this->status = 'Не удалось обработать данные';
        }

        echo $this->status;
    }

    private function validates()
    {
        if(! $this->site) {
            return false;
        }

        if($this->type === 'text' && ! $this->text) {
            return false;
        }

        return true;
    }
}