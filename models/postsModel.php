<?php

require_once 'class/sessions.php';

class PostsModel extends Model
{

    private $session;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
    }

    public function insertPost($post)
    {
        if ($this->session->sessionExists()) {
            $idUser = $_SESSION['id'];

            $data = [
                'post' => $post[0],
                'id_user' => $idUser,
            ];
            $res = $this->insert('posts', 'post, id_user', ':post, :id_user', $data);
            return $res;
        }
    }

    public function getPosts()
    {
        $res = $this->innerJoin('posts.id,post,user,id_user', 'posts', 'users', 'posts.id_user=users.id ORDER BY id DESC', []);
        return $res[0];
    }

}