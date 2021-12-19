<?php
include 'valFunction.php';
include 'configs.php';


$msg = array(
    "status" => 0,
    "mesage" => "You haven't completed all the inputs!"
);

    if(isset($_POST['fname']) and isset($_POST['sname']) and isset($_POST['email']) and isset($_POST['password']) and isset($_POST['password2'])){
    $fname = mysqli_real_escape_string($db, trim($_POST['fname']));
    $sname = mysqli_real_escape_string($db, trim($_POST['sname']));
    $email = mysqli_real_escape_string($db, trim($_POST['email']));
    $password = mysqli_real_escape_string($db, trim($_POST['password']));
    $password2 = mysqli_real_escape_string($db, trim($_POST['password2']));
    
    if(emailVal($email) and passVal($password) and $password === $password2){
        $password = md5($password);
        $sql = "INSERT INTO registers (fname, sname, email, password) VALUES('$fname','$sname','$email','$password')";
        mysqli_query($db, $sql); 
        $msg["mesage"] = "Signed up with success!";
        $msg["status"] = 1;
    }else{
        $msg['mesage'] = 'Email or password is wrong!';
    }
    }else{
        $msg['mesage'] = "The fields are empty!";
    }

echo json_encode($msg);
