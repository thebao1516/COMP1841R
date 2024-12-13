<?php 
    session_start();
    chdir('../');
    include '../utils/checkUserLogin.php';
    include '../utils/checkAdminLogin.php';

    try {
        $_POST['is_admin'] = false;
        $_POST['is_admin'] = ($_POST['is_admin'] == 'on' ? '1' : '0');
        include '../utils/hashPassword.php';
        include '../utils/updateprofile.php';
        // Update the profile
        header('location: home.php');
    } catch (PDOException $e) {
        $error = 'Database error: ' . $e->getMessage();
    } catch (Exception $e) {
        $error = 'Update error: ' . $e->getMessage();
    }

    include '../views/admin/layout.html.php';
?>