<?php

include '../connect.php';

$appointmentId=filterRequest("appointmentId");



$stmt= $con->prepare("Delete from `patients_appointment` where PA_id='$appointmentId'");
$stmt->execute();
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