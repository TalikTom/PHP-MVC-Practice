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


}