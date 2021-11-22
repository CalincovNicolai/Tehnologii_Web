<?php include('../db/config.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Contacts</title>
    <link rel="stylesheet" href="../css/contacts.css">
    <link rel="icon" href="../favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@200;300;600&family=Sacramento&display=swap" rel="stylesheet">
</head>

<body>
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <div class="bg-image img1">
        <p class="nico">© 2021 Calincov Nicolai.</p>
    </div>

    <div class="container">
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <div class="header">
            <h2>CONTACTS</h2>
        </div>
        <form action="../db/config.php" method="post" class="form" id="formContact">
            <div class="form-control">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="name">
            </div>
            <div class="form-control">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="email@example.com">
            </div>
            <div class="form-control">
                <label for="message">Message:</label>
                <textarea name="message" id="message" placeholder="message"></textarea>
            </div>

            <button name="submit" id="submit">Send</button>
        </form>
        <ul class="details">
            <li>Telephone: +37360131331</li>
            <li>Email: nicolai.calincov1@gmail.com</li>
            <li><a class="FB" href="https://www.facebook.com/profile.php?id=100008628242357">My Facebook</a></li>
        </ul>
    </div>
    <ul class="links">
        <li><a href="../index.html">Django</a></li>
        <li><a href="summary.html">Summary</a></li>
        <li><a href="actors.html">Actors</a></li>
        <li><a href="directors.php">Director</a></li>
        <li><a href="contacts.php">Contacts</a></li>
        <li><a href="paramount.html">Watch Now!</a></li>
        <div class="topnav-right">
            <li><a href="sign.php">Sign in</a></li>
            <li><a href="register.php">Sign up</a></li>
        </div>
    </ul>
    <script type="text/javascript" src="../scripts/main.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="../scripts/forms_validation.js"></script>
</body>

</html>