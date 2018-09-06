<?php include("../init.php");
   global $connect;
   $title = $_POST["title"]."%"; 
   $criteria = $_POST["criteria"];
   $query = "SELECT visitorId,name,personalNo,noOfPerson,city,state,country,email,mobileAllowed,reference,
   dateOfVisit,visitorId FROM visitordata WHERE $criteria LIKE '$title' ORDER BY visitorId DESC";
   $result = mysqli_query($connect,$query);
   while($row = mysqli_fetch_assoc($result)){   
    $array[] = $row;
  }
  header('Content-Type:Application/json');
  echo json_encode($array);
?>