<?php

include '../connect.php';
if(isset($_REQUEST['email'])){
    $email=filterRequest("email");
}

if (isset($_REQUEST['password'])) {
    $password=filterRequest("password");
}




if (isset($_REQUEST['password']) && isset($_REQUEST['email'])) {
    $stmt= $con->prepare("select * from user where email='$email' and password='$password'");
$stmt->execute();
$count=$stmt->rowCount();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

if($count>0)
{
    echo json_encode(array($data));
}
else
{
    echo json_encode(array(array("status"=>"fail")));
}
}

?>
