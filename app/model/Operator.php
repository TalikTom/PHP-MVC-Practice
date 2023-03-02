<?php

class Operator
{

    // The purpose of the method is to authenticate a user's email and password against the operator table in the database.
    public static function authorize($email, $password)
    {

        //The Database::getInstance() method returns a connection to the database.
        $connection = Database::getInstance();

        /*The prepare method of the connection object is called to prepare an SQL statement.
        The statement selects all the columns from the operator table where the email column matches the :email parameter. */
        $statement = $connection->prepare('
        
        select * from operator where email= :email

        ');

        //The execute() method is called on the prepared statement with an array containing the email parameter's value.
        $statement->execute([
            'email'=>$email
        ]);

        //The fetch() method is called on the statement object to retrieve the first row of the result set.
        $operator = $statement->fetch();

        //If the fetch() method returns null, it means no operator with the specified email was found, so null is returned.
        if($operator == null){
            return null;
        }
        /*The password_verify() function is called to check if the password provided by the user matches the hashed password stored in the database.
        If the password does not match, null is returned.*/
        if(!password_verify($password, $operator->password)){
            return null;
        }

        //If the password is correct, the unset() function is called to remove the password property from the $operator object before returning it.
        unset($operator->password);

        return $operator;

    }
}