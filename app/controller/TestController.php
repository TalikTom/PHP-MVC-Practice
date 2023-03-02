<?php

class TestController
{


    public function password()
    {
        echo password_hash('jonaton',PASSWORD_BCRYPT);
    }

}