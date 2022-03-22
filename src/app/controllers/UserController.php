<?php

use Phalcon\Mvc\Controller;

class UserController extends Controller
{

    public function IndexAction()
    {
        if (isset($_SESSION['user'])) {
            $this->view->posts = Posts::find("post_user_id = $_SESSION[user]");
        }
    }

    public function newblogAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
    }

    public function articleAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
    }

    public function updatePostAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
        $this->view->post[0]->title = $this->request->getPost('title');
        $this->view->post[0]->description = $this->request->getPost('description');
        $this->view->post[0]->article = $this->request->getPost('article');
        $success = $this->view->post[0]->save();
        if ($success) {
            header('Location: http://localhost:8080/user');
        }
    }

    public function addPostAction()
    {
        $post = new Posts();
        $user_id = $this->request->getPost('user_id');
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $article = $this->request->getPost('article');
        $post->title = $title;
        $post->post_user_id = $user_id;
        $post->description = $description;
        $post->article = $article;
        $success = $post->save();

        $this->view->success = $success;
        if($success){
            header('Location: http://localhost:8080/user');
        }
    }
}
