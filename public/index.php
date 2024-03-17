<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;


$url2 = strtok($_SERVER["REQUEST_URI"], '?');
$url = $_SERVER["REQUEST_URI"];

//todo add a switch statement router to route based on the url
//if it is "/posts" return an array of posts via the post controller
//if it is "/" return the homepage view from the main controller
//if it is something else return a 404 view from the main controller


if ($url2 === '/posts' && $_SERVER['REQUEST_METHOD'] === 'GET')
{
    $posts = new PostController();
    $posts->index();
}
else if ($url2 === '/posts' && $_SERVER['REQUEST_METHOD'] === 'POST')
{
    $posts = new PostController();
    $posts->savePost();
}
else if ($url2 === '/' && $_SERVER['REQUEST_METHOD'] === 'GET')
{
    $main = new MainController();
    $main->homepage();
}
else
{
    $main = new MainController();
    $main->notFound();
}





/*switch($url){
    case "/posts":
        $posts = new PostController();
        $posts->index();
        break;
    case "/":
        $main = new MainController();
        $main->homepage();
        break;
    default:
        $main = new MainController();
        $main->notFound();
};*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

