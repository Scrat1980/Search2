<?php

/**
 * Created by PhpStorm.
 * User: ivan
 * Date: 14.06.17
 * Time: 14:27
 */
class Db
{
    private $host = 'localhost';
    private $dbName = 'search';
    private $userName = 'root';
    private $password = '1';


    public function insert($record)
    {
        try {
            $dbHandler = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                $this->userName,
                $this->password
            );

            $sql = "INSERT INTO searches (site, elements, number_of_elements)
                VALUES ('$record->site', '$record->elements',
                '$record->number_of_elements')";

            $dbHandler->exec($sql);
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $dbHandler = null;
    }

    public function query($sql)
    {

        try {
            $dbHandler = new PDO(
                "mysql:host=$this->host;dbname=$this->dbName",
                $this->userName,
                $this->password
            );

            $result = $dbHandler->query($sql);

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $dbHandler = null;

        return $result;
    }

}