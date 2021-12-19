<?php
include 'valFunction.php';
include 'configs.php';

$msg = array(
    "status" => 0,
    "mesage" => ""
);

if(isset($_POST['name']) and isset($_POST['email']) and isset($_POST['message'])){
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $message = mysqli_real_escape_string($db, trim($_POST['message']));

    if(nameVal($name) and emailVal($email) and messageVal($message)){
    $sql = "INSERT INTO messages (name, email, message) VALUES('$name','$email','$message')";
    mysqli_query($db, $sql);
    $msg["mesage"] = "Message saved with success!";
    $msg["status"] = 1;
  }else{
    $msg["mesage"] = "The fields are wrong!";
  }
}else{
  $msg["mesage"] = "The fields are empty!";
}
echo json_encode($msg);
