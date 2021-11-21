<?php include('../db/server.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director</title>
    <link rel="icon" href="../favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@200;300;600&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/director.css">
</head>

<body>

    <div class="bg-image img1"></div>

    <div class="bg-text">
        <?php if (isset($_SESSION['message'])) : ?>
            <div class="msg">
                <?php
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>

        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'django_unchained') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM personaje") or die($mysqli->error);
        ?>

        <table>
            <thead>
                <tr>
                    <th>Nume</th>
                    <th>Prenume</th>
                    <th colspan="2">Actiune</th>
                </tr>
            </thead>

            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['nume']; ?></td>
                    <td><?php echo $row['prenume']; ?></td>
                    <td>
                        <a href="directors.php?edit=<?php echo $row['id_pers']; ?>" class="edit_btn">Edit</a>
                    </td>
                    <td>
                        <a href="../db/server.php?delete=<?php echo $row['id_pers']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <?php
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
    </div>

    <div class="add_elem">
        <form method="post" id="dj-form" action="../db/server.php">
            <div class="input-group">
                <label>ID</label>
                <input type="number" name="id_pers" min="1" value="<?php echo $id; ?>">
                <label>Nume</label>
                <input type="text" name="nume" value="<?php echo $nume; ?>" placeholder="Introduceti numele: ">
            </div>
            <div class="input-group">
                <label>Prenume</label>
                <input type="text" name="prenume" value="<?php echo $prenume; ?>" placeholder="Introduceti prenumele: ">
            </div>
            <div class="input-group">
                <?php if ($update == true) : ?>
                    <button class="btn" id="#btnId" type="submit" name="update">Update</button>
                <?php else : ?>
                    <button class="btn" id="#btnId" type="submit" name="save">Save</button>
                <?php endif ?>
            </div>
        </form>
    </div>
    <ul>
        <li><a href="../index.html">Django</a></li>
        <li><a href="summary.html">Summary</a></li>
        <li><a href="actors.html">Actors</a></li>
        <li><a href="directors.php">Director</a></li>
        <li><a href="contacts.html">Contacts</a></li>
        <li><a href="paramount.html">Watch Now!</a></li>
        <div class="topnav-right">
            <li><a href="sign.html">Sign in</a></li>
            <li><a href="register.html">Sign up</a></li>
        </div>
    </ul>
</body>

</html>