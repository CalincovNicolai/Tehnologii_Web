<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'django_client');

if (isset($_POST['submit_reg'])) {
    $first = $_POST['fname'];
    $second = $_POST['sname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO registers (fname, sname, email, password) VALUES('$first','$second','$email','$password')";
    mysqli_query($db, $sql);

    header("location: ../pagini/register.html");
}

if (isset($_POST['submit_log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM registers WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) == 1) {
        header("location: ../index.html");
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['message'];

    $sql = "INSERT INTO messages (name, email, message) VALUES('$name','$email','$comment')";
    mysqli_query($db, $sql);

    header("location: ../pagini/contacts.html");
}
