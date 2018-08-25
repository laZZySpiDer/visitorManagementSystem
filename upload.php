<?php

    $folder = 'uploads/';
   
   
    $filename = strtotime("now").".jpg";
    $input_con = file_get_contents("php://input");
    $file_path = $folder.$filename;
    
    setcookie("imgName", $filename, time() + (120 * 30), "/");
    file_put_contents($file_path,$input_con,0,null);

  

?>