<?php

use Phalcon\Mvc\Controller;


class IndexController extends Controller
{
    public function indexAction()
    {

        $this->view->posts = Posts::find();
        // return '<h1>Hello World!</h1>';
    }
    public function fullarticleAction()
    {
        $this->view->form = $this->request->getPost();
        $blog_id = $this->request->getPost('blog_id');
        $user_id = $this->request->getPost('user_id');
        $this->view->post = Posts::find($blog_id);
        $this->view->user = Users::find($user_id);
    }
}
