<?php

namespace app\controllers;
use app\core\Controller;
use app\models\Post;

class PostController extends Controller
{
//todo make a method to return some posts, post objects should come from the post model class
//also need to make a twig template to show the posts
//an example is in app/controllers/UsersController
    public function index()
    {
        $postModel = new Post();
        $template = $this->twig->load('posts/posts.twig');
        $homepageData = [
            'posts' => $postModel->getAllPosts(),
        ];
        echo $template->render($homepageData);

    }

    public function savePost()
    {
        $id = $_POST['id'] ? $_POST['id'] : false;
        $username = $_POST['username'] ? $_POST['username'] : false;
        $content = $_POST['content'] ? $_POST['content'] : false;
        $error = [];

        if ($id)
        {
            if ($id < 0 || $id > 100 || !intval($id))
            {
                $errors['ageInvalid'] = 'age is invalid';
            }
        }
        else
        {
            $errors['requiredAge'] = 'age is required';
        }

        if ($username)
        {
            $username = htmlspecialchars($username, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            if (strlen($username) < 2)
            {
                $errors['usernameShort'] = 'username is too short';
            }
            else if (strlen($username) > 20)
            {
                $errors['usernameLong'] = 'username is too long';
            }
        }
        else
        {
            $errors['requiredUsername'] = 'username is required';
        }
        
        if ($content)
        {
            $content = htmlspecialchars($content, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);

            if (strlen($content) > 100)
            {
                $errors['contentLong'] = 'content is too long';
            }
        }
        else
        {
            $errors['contentRequired'] = 'content is required';
        }

        if (count($errors))
        {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $returnData = [
            'id' => $id,
            'username' => $username,
            'content' => $content,
        ];
        echo json_encode($returnData);
        exit();
        
    }

}