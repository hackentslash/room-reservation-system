<?php
session_start();

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPV RRS</title>
    <link rel="stylesheet" href="assets\global_styles.css">
</head>
<body>
    <main id="index-main">
        <h1>Room Reservation System</h1>
        <form id="login-form" action="process/login.php" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Log In</button>
            <?php
            
                if (isset($_SESSION['login_error'])){
                    echo '<p>'.$_SESSION['login_error'].'</p>';
                    unset($_SESSION['login_error']);
                }
            
            ?>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>