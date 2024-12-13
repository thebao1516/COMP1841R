<?php
    session_start();
    include '../utils/checkUserLogin.php';

    try {
        // Get all posts
        include "../models/post.php";
        $posts = getAllPosts();

        include "../views/feeds.html.php";
        return;
    } catch (PDOException $e) {
        $error = "Database error: " . $e->getMessage();
    }

    include '../views/error.html.php';
?>