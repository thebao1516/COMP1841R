<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>

    <!-- Dynamic css file link -->
    <?php if ($title == 'Profile'): ?>
        <!-- At the profile page -->
        <link rel="stylesheet" href="../css/style.css">
    <?php else: ?>
        <link rel="stylesheet" href="../../css/style.css">
    <?php endif; ?>
</head>
<body>
    <nav class="header">
        <!-- Dynamic navigation link -->
        <?php if ($title == 'Profile'): ?>
            <!-- At the profile page -->
            <a class="brand" href="../">
                <img class="logo" src="https://moodlecurrent.gre.ac.uk/pluginfile.php/1/core_admin/logocompact/300x300/1698130741/LOGO_REVISION_MASTER%20N%202022%20150.png" 
                alt="Logo"> 
            </a>
        <?php else: ?>
            <a class="brand" href="../../">
                <img class="logo" src="https://moodlecurrent.gre.ac.uk/pluginfile.php/1/core_admin/logocompact/300x300/1698130741/LOGO_REVISION_MASTER%20N%202022%20150.png" 
                alt="Logo"> 
            </a>
        <?php endif; ?>
       

        <!-- responsive-->
        <input id="bmenub" type="checkbox" class="show">
        <label for="bmenub" class="burger pseudo button">menu</label>
        
        <div class="menu">
            <!-- Dynamic navigation link -->
            <?php if ($title == 'Profile'): ?>
                <!-- At the profile page -->
                <a href="../controllers/admin/home.php">Home</a>
                <a href="../controllers/admin/adduser.php">Add a user</a>
                <a href="../controllers/admin/addmodule.php">Add a module</a>
                <a href="../controllers/profile.php">View profile</a>
                <a href="../controllers/admin/messages.php">View messages</a>
                <a href="../controllers/logout.php">Logout</a>
            <?php else: ?>
                <a href="../../controllers/admin/home.php">Home</a>
                <a href="../../controllers/admin/adduser.php">Add a user</a>
                <a href="../../controllers/admin/addmodule.php">Add a module</a>
                <a href="../../controllers/profile.php">View profile</a>
                <a href="../../controllers/admin/messages.php">View messages</a>
                <a href="../../controllers/logout.php">Logout</a>
            <?php endif; ?>            
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