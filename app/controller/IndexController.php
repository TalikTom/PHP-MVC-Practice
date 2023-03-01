<?php

class IndexController extends Controller
{

    public function index()
    {

        $this->view->render('index');

    }

    public function contact()
    {
        $this->view->render('contact');

    }

    public function login()
    {
        $this->view->render('login', [
            'message' => '',
            'email' => '',
        ]);
    }


}