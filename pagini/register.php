<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign up</title>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
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
        <div class="header">
            <h2>Sign up</h2>
        </div>
        <form method="post" class="form" id="forms_validation">
            <div class="form-control">
                <label>First Name:</label>
                <input type="text" id="fname" name="fname" placeholder="John">
            </div>
            <div class="form-control">
                <label>Second Name:</label>
                <input type="text" id="sname" name="sname" placeholder="Doe">
            </div>
            <div class="form-control">
                <label>Email:</label>
                <input type="email" id="email" name="email" placeholder="email@example.com">
            </div>
            <div class="form-control">
                <label>Password:</label>
                <input type="password" id="password" name="password" placeholder="*************">
            </div>
            <div class="form-control">
                <label>Re-Enter Password:</label>
                <input type="password" id="password2" name="password2" placeholder="*************">
            </div>
            <button name="submit_reg" type="submit" class="btn">Register</button>
            <span id="response"></span>
            <div class="msg" id="msg">

            </div>
        </form>
    </div>
    <ul>
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