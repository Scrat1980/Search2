<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 13.06.17
 * Time: 15:08
 */

class FindView
{
    private $links =
        "</a></p>"
        . "<p><a href='/index.php?page=results'>"
        . 'Результаты'
        . "</a></p>";

    private $form =
        "<form>
            <label for='site'>Введите имя сайта</label>
            <input id='site' type='text'><br>
            
            <label for='type'>Введите тип содержимого</label>
            <select id='type'>
                <option selected value='link'>Ссылка</option>
                <option value='image'>Изображение</option>
                <option value='text'>Текст</option>
            </select><br>
            
            <div id='textDiv' style='display:none'>
                <label for='textField'>Введите текст для поиска</label>
                <input id='textField' type='text'><br>
            </div>
            
            <input id='submit' type='submit'>                
                
        </form>";

    private $statusContainer = "<p id='status'></p>";

    public function output()
    {
        return $this->links
            . $this->form
            . $this->statusContainer;
    }
}