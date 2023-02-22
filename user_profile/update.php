<?php
include "../connect.php";
$id = filterRequest("id");
$username=filterRequest("username");
$email=filterRequest("email");
$password=filterRequest("password");
$phone= filterRequest("phone");

$stmt = $con->prepare(("UPDATE `user` SET `name`=?,`email`=?,`password`=?,`phone`=?  WHERE `id`=?"));
$stmt->execute(array($username,$email,$password,$phone,$id));
$count=$stmt->rowCount();
if($count>0)
{
    echo json_encode(array("status"=>"success"));
}
else{
    echo json_encode((array("status"=> "failed")));
}
?>