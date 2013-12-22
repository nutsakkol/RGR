<?php
include 'Database.php';
class Configure extends Database
{
    var $FIO = array();
    var $gryppa = array();
    var $numRows;

    function __construct()
    {
        parent::connect();
    }
}