<?php

require_once 'models/postsModel.php';

class Dashboard extends Controller
{

    private $postModel;
    private $errorManagement;

    public function __construct()
    {
        parent::__construct();
        $this->errorManagement = new ErrorsManagement();
        $this->postModel = new PostsModel();
        $this->watchPosts();
    }

    public function post()
    {
        $post = $this->httpData(['post'], $_POST);
        $res = $this->postModel->insertPost($post);
        if ($res) {
            $this->redirect('dashboard', ['success' => $this->errorManagement::SUCCESS_POST_SEND]);
        } else {
            $this->redirect('dashboard', ['error' => $this->errorManagement::ERROR_POST_NOTSEND]);
        }
    }

    public function watchPosts()
    {
        $data = $this->postModel->getPosts();
        $this->setDataView($data);
    }

}