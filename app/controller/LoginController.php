<?php


class LoginController extends Controller
{
    public function authorization()
    {

        //check if email is set, if it's not execute following code block
        if(!isset($_POST['email']) ||
        strlen(trim($_POST['email'])) === 0) {
            $this->view->render('login',[
                'message' => 'You have to enter email',
                'email' => ''
            ]);
            return;
        }

        if(!isset($_POST['password']) ||
        strlen(trim($_POST['password'])) === 0){
            $this->view->render('login', [
                'message' => 'Password required',
                'email' => $_POST['email']
            ]);
            return;
        }

        $operator = Operator::authorize($_POST['email'], $_POST['password']);

        if($operator == null){
            $this->view->render('login', [
                'message'=> 'Email and password are not a match',
                'email' => $_POST['email']
            ]);
            return;
        }

        $_SESSION['auth'] = $operator;
        header('location: /dashboard/index');
    }


}