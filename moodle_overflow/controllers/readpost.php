<?php
    session_start();
    include '../utils/checkUserLogin.php';

    try {
        include '../models/post.php';
        $post = getPost();

        if (empty($post)) throw new Exception('No post found');

        include '../models/comment.php';
        $comments = getComments($post['post_id']);

        ob_start();
        include '../views/comments.html.php';
        $commentSection = ob_get_clean();

        ob_start();
        include '../views/readpost.html.php';
        $output = ob_get_clean();
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    } catch (Exception $e) {
        $error = 'Error: ' . $e->getMessage();
    }

    if (isset($error)) $title = 'Error';
    else $title = "$post[title]";
    include '../views/layout.html.php'
?>