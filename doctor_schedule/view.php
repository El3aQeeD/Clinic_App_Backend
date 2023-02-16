<?php

include '../connect.php';
$id=filterRequest("id");

$stmt= $con->prepare("SELECT * FROM `doctor's_schedule` WHERE `doctor_id`= ?");
$stmt->execute(array($id));
$count=$stmt->rowCount();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

if($count>0)
{
    echo json_encode($data);
}
else
{
    echo json_encode(array("status"=>"fail"));
}

?>