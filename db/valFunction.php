<?php
$db = mysqli_connect('localhost', 'root', '', 'django_client');

//Functii register
function fnameVal($fname)
{

    if (empty($fname)) {
        $msg["mesage"] = "First name is required!";
    } elseif (strlen($fname) < 8) {
        $msg["mesage"] = "First name must have at least 2 characters!";
    } else {
        return true;
    }
}

function snameVal($sname)
{

    if (empty($sname)) {
        $msg["mesage"] = "First name is required!";
    } elseif (strlen($sname) < 8) {
        $msg["mesage"] = "First name must have at least 2 characters!";
    } else {
        return true;
    }
}

function emailVal($email) {
    
    if (empty($email)) {
        $msg["mesage"] = "Email is required!";
      } 
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg["mesage"] = "Invalid email format!";
        }
        else{
            return true;
        }
  }

function passVal($password){
    if (empty($password)) {
        $msg["mesage"] = "Password is required!";
      } 

    elseif(strlen($password) < 8){
        $msg["mesage"] = "Password must have at least 8 characters!";
    }
    else{
            return true;
        }
    }


//Functii Contact
function nameVal($fname){
    if(empty($fname)){
      $msg['mesage'] = "The name is missing!";
    }else{
      return true;
    }
  }
  
  function messageVal($message){
    if(empty($message)){
      $msg["mesage"] = "Message cannot be blank!";
    }
    elseif (strlen($_POST['message']) < 20){
      $msg["mesage"] = "Message should not be less then 20 characters!";
  }else{
    return true;
  }
  }
