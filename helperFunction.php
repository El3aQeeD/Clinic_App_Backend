<?php

function filterRequest($requestName){
    return htmlspecialchars(strip_tags($_POST[$requestName]));
}
function imageUpload($imageRequest)
{
    $MB=1048576;
    $imagename=rand(10,1000).$_FILES[$imageRequest]['name'];
    $imagetmp=$_FILES[$imageRequest]['tmp_name'];
    $imagesize=$_FILES[$imageRequest]['size'];
    $allowExt=array("jpg","png","pdf","mp4","gif");
    $strToArray= explode(".",$imagename);
    $ext   =end($strToArray);
    $ext=strtolower($ext);
    if(!empty($imagename) && !in_array($ext,$allowExt)){
        $msgError[] = "Ext" ;
    }
/*
    if($imagesize > 2 * $MB){
        $msgError[] = "size" ;
    }
*/
    if(empty($msgError)){
        move_uploaded_file($imagetmp,"../upload/".$imagename);
    return $imagename;
    }
    else
    {
        return "fail";

    }
}


function deleteFile($dir,$imagename)
{
    if(file_exists($dir."/".$imagename))
    {
        unlink($dir."/".$imagename);
    }
}
?>