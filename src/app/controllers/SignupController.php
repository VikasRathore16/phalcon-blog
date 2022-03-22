<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{

    public function IndexAction()
    {
    }

    public function registerAction()
    {
        $user = new Users();
        $checkemail = Users::findByEmail($this->request->getPost('email'));
        if (count($checkemail) > 0) {
            $this->view->message = "User Exists! Please use Another email address";
        }
        $user->assign(
            $this->request->getPost(),
            [
                'username',
                'email',
                'password',
            ]
        );
        if (count($checkemail) == 0) {
            $success = $user->save();

            $this->view->success = $success;

            if ($success) {
                $this->view->message = "Register succesfully ! Wait For Account Approval";
            } else {
                $this->view->message = "Not Register succesfully due to following reason: <br>" . implode("<br>", $user->getMessages());
            }
        }
    }
}
