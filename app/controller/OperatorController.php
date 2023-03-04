<?php

class OperatorController extends AdminController
{

    private $viewPath = 'private' . DIRECTORY_SEPARATOR . 'operators' . DIRECTORY_SEPARATOR;

    public function index()
    {

        $this->view->render($this->viewPath . 'index');

    }


}