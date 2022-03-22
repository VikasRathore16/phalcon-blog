<?php

use Phalcon\Mvc\Controller;

class AdminController extends Controller
{

    public function IndexAction()
    {
        $this->view->posts = Posts::find();
    }
    public function usersAction()
    {
        $this->view->users = Users::find();
    }


    //Functions on Article


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
            header('Location: http://localhost:8080/admin');
        }
    }

    public function publishAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
        $this->view->post[0]->status = 'Published';
        $this->view->post[0]->save();
    }

    public function pendingAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
        $this->view->post[0]->status = 'Pending';
        $this->view->post[0]->save();
    }

    public function deletePostAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $this->view->post = Posts::find($blog_id);
        $this->view->post[0]->delete();
    }

    public function trendingPostAction()
    {
        $blog_id = $this->request->getPost('blog_id');
        $val = $this->request->getPost('val');
        $this->view->post = Posts::find($blog_id);
        $this->view->post[0]->trending = $val;
        $this->view->post[0]->save();
    }

    //Functions on User 

    public function deleteUserAction()
    {
        $user_id = $this->request->getPost('user_id');
        $this->view->user = Users::find($user_id);
        $this->view->user[0]->delete();
    }

    public function approveUserAction()
    {
        $user_id = $this->request->getPost('user_id');
        $this->view->user = Users::find($user_id);
        $this->view->user[0]->status = 'Approved';
        $this->view->user[0]->save();
    }

    public function restrictUserAction()
    {
        $user_id = $this->request->getPost('user_id');
        $this->view->user = Users::find($user_id);
        $this->view->user[0]->status = 'Restricted';
        $this->view->user[0]->save();
    }
}
