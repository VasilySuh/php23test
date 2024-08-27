<?php
require 'config/db.php';
require 'controllers/PostController.php';
require 'controllers/CommentController.php';

$postController = new PostController($pdo);
$commentController = new CommentController($pdo);

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'view':
        $post_id = $_GET['post_id'];
        $postController->view($post_id);
        break;
    case 'add':
        $postController->add();
        break;
    case 'edit':
        $post_id = $_GET['post_id'];
        $postController->edit($post_id);
        break;
    case 'add_comment':
        $post_id = $_GET['post_id'];
        $commentController->add($post_id);
        break;
    default:
        $page = $_GET['page'] ?? 1;
        $postController->list($page);
        break;
}
?>