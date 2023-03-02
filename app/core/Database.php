<?php

class Database extends PDO
{

    /*The purpose of the singleton pattern is to ensure that there is only ever one instance of the class in the application.
    This is useful when working with databases,
    as it ensures that multiple connections to the same database are not created unnecessarily, which can cause performance issues. */



    /*The class has a private static variable called "$instance" that is initialized to null.
     The purpose of this variable is to store a reference to the singleton instance of the class. */
    private static $instance = null;

    private function __construct()
    {

        //extract variables from database key in config file using public static method config in App class
        extract(App::config('database'));

        /*The "parent::__construct" line is  used to call the constructor of the parent PDO class,
         passing in the database configuration data that was extracted earlier. */
        parent::__construct($dsn, $user, $password);

        //result of database queries will be returned as objects.
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }


    /* The class also has a public static method called "getInstance" that is used to get a reference to the singleton instance of the class.
    Inside this method, the "self::$instance" variable is checked to see if it is null.
    If it is, a new instance of the class is created using the private constructor,
    and the "$instance" variable is set to reference this new instance.
    If "$instance" is not null, it means that an instance of the class has already been created, so the existing instance is returned. */

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

}