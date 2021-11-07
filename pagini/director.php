<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director</title>
    <link rel="icon" href="../favicon.ico">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300&family=Montserrat:wght@200;300;600&family=Sacramento&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/director.css">
</head>

<body>
    <?php require_once 'process.php'; ?>

    <?php

    if (isset($_SESSION['message'])) : ?>

        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <div class="bg-image img1"></div>

    <h2>QUENTIN TARANTINO</h2>
    <div class="container">
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'django_unchained') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM personaje") or die($mysqli->error);
        //pre_r($result);
        ?>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Prenume</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php
                while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo $row['nume']; ?></td>
                        <td><?php echo $row['prenume']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id_pers']; ?>" class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id_pers']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </table>
        </div>

        <?php
        function pre_r($array)
        {
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>

        <div class="row justify-content-center">
            <form action="process.php" method="POST">
                <input type="hidden" name="id_pers" value="<?php echo $id; ?>">
                <div class="form-group">
                    <label>Nume</label>
                    <input type="text" name="nume" class="form-control" value="<?php echo $nume; ?>" placeholder="Introduceti numele: ">
                </div>
                <div class="form-group">
                    <label>Prenume</label>
                    <input type="text" name="prenume" class="form-control" value="<?php echo $prenume; ?>" placeholder="Introduceti prenumele: ">
                </div>
                <div class="form-group">
                    <?php
                    if ($update == true) :
                    ?>
                        <button type="submit" name="update" class="btn btn-info">Update</button>
                    <?php else : ?>
                        <button type="submit" name="save" class="btn btn-primary">Save</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
    </div>
    <ul>
        <li><a href="../index.html">Django</a></li>
        <li><a href="summary.html">Summary</a></li>
        <li><a href="actors.html">Actors</a></li>
        <li><a href="director.php">Director</a></li>
        <li><a href="contacts.html">Contacts</a></li>
        <li><a href="paramount.html">Watch Now!</a></li>
        <li><a href="sign.html">Sign in</a></li>
    </ul>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>