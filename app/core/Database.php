<?php

class Database extends PDO
{
    private static $instance = null;

    private function __construct()
    {
        extract(App::config('database'));
        parent::__construct($dsn, $user, $password);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
    }


    public static function getInstance()
    {
        if(self::$instanca==null){
            self::$instanca=new self();
        }

        return self::$instanca;
    }
    
}