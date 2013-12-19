<?php

class db
{
    protected $connection;
    private $host = 'localhost';
    private $userName = 'donik';
    private $password = '445566';
    private $database = 'auth';

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
    }

    public function connect()
    {
        $this->connection = mysql_connect($this->host, $this->userName, $this->password)
        or $this->CHttpException('<b style="font-size: 25px">403', 'Db connected Error</b>');
        mysql_select_db($this->database, $this->connection);
    }

    public function CHttpException($number = 404, $error = 'Не корректный запрос')
    {
        try {
            throw new Exception($number . ' ' . $error);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}