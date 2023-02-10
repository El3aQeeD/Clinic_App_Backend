<?php

include '../connect.php';

$name=filterRequest("name");
$doctorSpecialtyId=filterRequest("doctorSpecialtyId");
$doctorAbout=filterRequest("doctorAbout");
$image=imageUpload("doctorImageFile");

if($image != 'fail')
{
    $stmt= $con->prepare("INSERT INTO doctors (doctor_name,doctor_specialty_id,doctor_about,doctor_image) VALUES (?,?,?,?)");
    $stmt->execute(array($name,$doctorSpecialtyId,$doctorAbout,$image));
    $count=$stmt->rowCount();
    
    if($count>0)
    {
        echo json_encode(array("status"=>"success"));
    }
    else
    {
        echo json_encode(array("status"=>"fail"));
    }
}
else{
    echo json_encode(array("status"=>"fail"));
}



