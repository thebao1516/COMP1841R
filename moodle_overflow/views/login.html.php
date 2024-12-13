<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <h1>Log in to Moodle Overflow</h1>

    <?php if (isset($error)) {
        ob_start();
        include '../views/error.html.php';
        $errorContainer = ob_get_clean(); 
        echo $errorContainer;
    }  
    ?>

    <div class="login">

        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" class="input" name="email" id="" placeholder="Your email" required>
            <label for="password">Password:</label>
            <input type="password" class="input" name="password" id="" placeholder="Your password" required minlength="8">
            <button class="button" name="submit" type="submit" class="button">Login</button>
        </form>
    </div>
</body>

</html>