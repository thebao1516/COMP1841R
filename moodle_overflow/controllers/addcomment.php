<?php
    session_start();
    include '../utils/checkUserLogin.php';

    try {
        include '../models/comment.php';
        addComment($_POST['post_id'], $_POST['content'], $user['id']);
        header("location: readpost.php?id=$_POST[post_id]");
    } catch (PDOException $e) {
        $error = 'Databaser error: ' . $e->getMessage();
    }

    include "../views/layout.html.php";
?>