<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body style="overflow: auto;height: 250px;">
    <nav class="header">
        <a class="brand" href="../">
            <img class="logo" src="https://moodlecurrent.gre.ac.uk/pluginfile.php/1/core_admin/logocompact/300x300/1698130741/LOGO_REVISION_MASTER%20N%202022%20150.png" 
            alt="Logo"> 
        </a>

        <!-- responsive-->
        <input id="bmenub" type="checkbox" class="show">
        <label for="bmenub" class="burger pseudo button">menu</label>
        
        <div class="menu">
            <a href="../controllers/home.php">Home</a>
            <a href="../controllers/addpost.php">Add a post</a>
            <a href="../controllers/contact.php">Contact us</a>
            <a href="../controllers/profile.php">View profile</a>
            <a href="../controllers/logout.php">Logout</a>
        </div>
    </nav>

    <?php if (isset($error)): ?> 
        <?php
            ob_start();
            include '../views/error.html.php';
            $errorContainer = ob_get_clean(); 
            echo $errorContainer;
        ?>
    <?php else: ?>
        <main class="dynamic-content">
            <?=$output?>
        </main>
    <?php endif; ?>
</body>
</html>