<?php include("init.php");
   global $connect;
   $id = $_POST["id"];
   $query = "SELECT visitorId,name,personalNo,noOfPerson,city,state,country,email,mobileAllowed,reference,
   dateOfVisit,visitorId FROM visitordata WHERE visitorId='$id'";
   $result = mysqli_query($connect,$query);
   while($row = mysqli_fetch_assoc($result)){   
    $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);
?>