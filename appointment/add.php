<?php

include '../connect.php';

$patientId=filterRequest("patientId");
$doctorId=filterRequest("doctorId");

    $stmt= $con->prepare("INSERT INTO `patients_appointment` (patient_id,doctor_id) VALUES (?,?)");
    $stmt->execute(array($patientId,$doctorId));
    $count=$stmt->rowCount();
    
    if($count>0)
    {
        echo json_encode(array("status"=>"success"));
    }
    else
    {
        echo json_encode(array("status"=>"fail"));
    }




