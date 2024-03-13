<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$password = $_POST["p"];
$gender = $_POST["g"];

if (empty($fname)){
    echo ("Please enter your First Name.");
}else if(strlen($fname) > 45){
    echo ("First Name must contain LOWER THAN 45 characters.");
}


?>

