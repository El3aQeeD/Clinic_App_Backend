<?php

include '../connect.php';

$username=filterRequest("username");
$email=filterRequest("email");
$password=filterRequest("password");
$phone= filterRequest("phone");
$userTypeId=1;


$stmt= $con->prepare("INSERT INTO user (`name`,email,`password`,`phone`,`user_type_id`) VALUES (?,?,?,?)");
$stmt->execute(array($username,$email,$password,$phone,$userTypeId));
$count=$stmt->rowCount();

if($count>0)
{
    echo json_encode(array("status"=>"success"));
}
else
{
    echo json_encode(array("status"=>"fail"));
}

?>