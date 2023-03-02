<?php

class Operator
{
    public static function authorize($email, $password)
    {
        $connection = Database::getInstance();

        $statement = $connection->prepare('
        
        select * from operator where email= :email

        ');

        $statement->execute([
            'email'=>$email
        ]);

        $operator = $statement->fetch();

        if($operator == null){
            return null;
        }

        if(!password_verify($password, $operator->password)){
            return null;
        }

        unset($operator->password);

        return $operator;

    }
}