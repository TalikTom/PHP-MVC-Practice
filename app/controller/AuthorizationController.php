<?php

abstract class AuthorizationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        if(!App::auth()){
            $this->view->render('login',[
                'message'=>'You have to login first',
                'email'=>''
            ]);
        }
    }

}
