<?php

include '../connect.php';

$stmt= $con->prepare("SELECT * FROM doctors");
$stmt->execute();
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