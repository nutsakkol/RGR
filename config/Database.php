<?php
class Database
{
    var $connect;
    var $selectDatabase;

    public function connect()
    {
        $server = 'localhost';
        $user = 'arex';
        $password = '445566';
        $db = 'rgr';

        $this->connect = mysql_connect($server, $user, $password) or die(mysql_error());
        $this->selectDatabase = mysql_select_db($db);

    }
}