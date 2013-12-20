<?php

class UsersModel extends Model
{
    public function model($className = __CLASS__)
    {
        $className = explode('Model', $className);
        return $className[0];
    }
}