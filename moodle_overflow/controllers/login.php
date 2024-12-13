<?php
    session_start();
    if (isset($_SESSION['user'])  && $_SESSION['user'] != '' && $_SESSION['user']['is_admin']) header('location: admin/home.php');
    else if (isset($_SESSION['user']) && $_SESSION['user'] != '') header('location: home.php');

    if (isset($_POST['submit'])) {
        // POST method
        try {
            // Validate user input
            if (empty($_POST['email']) || empty($_POST['password']))
            $error = 'Login error: Your email or password is missing';
            // Validate email
            $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (empty($error) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                $error = 'Login error: Your email is invalid';

            // Proceed login
            if (empty($error)) {
                include '../models/user.php';
                $user = getUser($_POST['email']);

                include '../utils/hashPassword.php';
                if ($user && verifyPassword($_POST['password'], $user['password'])) {
                    $_SESSION['user'] = $user;
                    if ($user['is_admin']) {
                        header('location: admin/home.php');  
                    }
                    // Otherwise a normal user
                    else header('location: home.php');  
                }
                else $error = 'Login error: Your email or password is incorrect';
            }
           
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    }

    // GET method
    include '../views/login.html.php';
?>