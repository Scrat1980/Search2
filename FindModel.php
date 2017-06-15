<?php
/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:12
 */

class FindModel
{
    private $site;
    private $type;
    private $text;
    private $patternLink = "@<a\b[^>]*>(.*?)</a>@";
    private $patternImage = '@<img[^>]+src=\"([^\">]+)\"@';

    public function getDataFromSite($site, $type, $text)
    {
        $this->site = $site;
        $this->type = $type;
        $this->text = $text;

        $page = $this->getPage();
        $record = $this->extractElementsFromPage($page);

        $db = new Db();
        $db->insert($record);

        return true;
    }

    private function getPage()
    {
        $curlHandler = curl_init();
        curl_setopt_array(
            $curlHandler,
            [
                CURLOPT_URL => $this->site,
                CURLOPT_RETURNTRANSFER => 1,
            ]
        );

        $output = curl_exec($curlHandler);
        curl_close($curlHandler);

        return $output;
    }

    private function extractElementsFromPage($page)
    {
        $matches = [];
        $pattern = $this->getPattern();
        preg_match_all($pattern, $page, $matches);

        $elementsList = $matches[0];
        $elements = '';
        foreach ($elementsList as $element) {
            $elements .= $element;
        }

        $record = new Record(
            $this->site,
            $elements,
            count($elementsList)
        );

        return $record;

    }

    private function getPattern()
    {
        switch($this->type){
            case 'link':
                $pattern = $this->patternLink;
                break;
            case 'image':
                $pattern = $this->patternImage;
                break;
            case 'text':
                $pattern = '@' . $this->text . '@';
        }

        return $pattern;
    }


}