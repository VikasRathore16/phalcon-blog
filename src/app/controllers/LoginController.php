<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{
    public function indexAction()
    {
    }

    public function loginAction()
    {
        // echo "hello";
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = Users::query()
            ->where("email = '$email'")
            ->andWhere("password = '$password'")
            ->execute();

        print_r(count($user));
        if (count($user) > 0) {
            if ($user[0]->username == 'admin') {
                
                header('Location: http://localhost:8080/admin');
            } else {
                $_SESSION['user'] = $user[0]->user_id;
                header("Location: http://localhost:8080/user/index?user_id=" . $user[0]->user_id);
            }
        }
    }


    public function signoutAction()
    {
    }
}
