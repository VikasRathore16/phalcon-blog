<?php

use Phalcon\Mvc\Controller;

class LoginController extends Controller
{


    public function indexAction()
    {
        if ($this->request->isPost()) {

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $checkemail = Users::findByEmail($email);
            $user = Users::query()
                ->where("email = '$email'")
                ->andWhere("password = '$password'")
                ->execute();
            if (count($checkemail) == 0) {
                $this->view->msg = 'User does not exist . Please Sign Up';
            }

            if (count($user) > 0) {
                if ($user[0]->status == 'Approved') {
                    if ($user[0]->username == 'admin') {
                        header('Location: http://localhost:8080/admin');
                    } else {
                        $_SESSION['user'] = $user[0]->user_id;
                        header("Location: http://localhost:8080/user/index?user_id=" . $user[0]->user_id);
                    }
                } else {
                    $this->view->msg = 'Wait for Approval';
                }
            }
        }
    }


    public function signoutAction()
    {
    }
}
