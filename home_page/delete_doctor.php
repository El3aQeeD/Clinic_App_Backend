<?php

include '../connect.php';

$doctorId=filterRequest("id");
//$image=filterRequest("image");



$stmt= $con->prepare("delete from doctors where doctor_id='$doctorId'");
$stmt->execute();
$count=$stmt->rowCount();

if($count>0)
{
    //deleteFile("../upload",$image);
    echo json_encode(array("status"=>"success"));
}
else
{
    echo json_encode(array("status"=>"fail"));
}

?>