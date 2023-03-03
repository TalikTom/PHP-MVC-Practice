<?php

class DashboardController extends Controller
{


    public function index()
    {
        $this->view->render('private' . DIRECTORY_SEPARATOR .
            'dashboard');
    }

}