<?php
    session_start();
    include '../utils/checkUserLogin.php';

    $title = 'Contact Us';
    if (isset($_POST['content'])) {
        // POST method
        try {
            include '../models/message.php';
            addMessage($_POST['email_from'], $_POST['subject'], $_POST['content']);
            $output = '<p style="text-align: center;">Thank you for your message we will get back to you shortly</p>';
        } catch (PDOException $e) {
            $error = 'Database error: ' . $e->getMessage();
        }
    } 
    else {
        // GET method
        ob_start();
        include '../views/mailform.html.php';
        $output = ob_get_clean();
    }

    include '../views/layout.html.php';
?>