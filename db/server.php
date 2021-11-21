<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'django_unchained') or die(mysqli_error($mysqli));

// initialize variables
$id = 0;
$update = false;
$nume = '';
$prenume = '';

if (isset($_POST['save'])) {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];

    $mysqli->query("INSERT INTO personaje (nume, prenume) VALUES('$nume','$prenume')") or
    die($mysqli->error);
    $_SESSION['message'] = "Personaj salvat cu succes!";
    header('location: ../pagini/directors.php');
}

	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
        $result = $mysqli->query("SELECT * FROM personaje WHERE id_pers=$id") or die($mysqli->error());

		if ($result == true) {
            $row = $result->fetch_array();
            $nume = $row['nume'];
            $prenume = $row['prenume'];
		}
	}

if (isset($_POST['update'])) {
    $id = $_POST['id_pers'];
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];

    $mysqli->query("UPDATE personaje SET nume='$nume', prenume='$prenume' WHERE id_pers=$id") or die($mysqli->error());
    $_SESSION['message'] = "Personaj editat cu succes!";
    header('location: ../pagini/directors.php');
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM personaje WHERE id_pers=$id") or die($mysqli->error());
    $_SESSION['message'] = "Personaj sters cu succes!";
    header('location: ../pagini/directors.php');
}
