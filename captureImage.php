


 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capture Image</title>
    <style>
      @page {
        /* dimensions for the whole page */
        size: A5 landscape;
      }
</style>
    <?php include('header.php');  ?>
</head>

<body>
<?php include('nav.php');  ?>
        <?php  
          include ('init.php');   
          global $connect;     
          if($_SERVER["REQUEST_METHOD"] == "POST")  
            {  
              $fname = $_POST["fname"];
              $lname = $_POST["lname"];
              $name = $fname." ".$lname;
              $emailId = $_POST["emailId"];
              $contNo = $_POST["contNo"];
              $address = $_POST["address"];
            
              
              if($_POST['adultCount'] == NULL ){
                $adultCount = 1; 
              }else{
                $adultCount = $_POST["adultCount"];
              }

              if( $_POST['childCount'] == NULL){
                $childCount = 0;
              }else{
                $childCount = $_POST["childCount"];
              }
              $totalCount = $adultCount + $childCount ;
              $cityDropdown = $_POST["cityDropdown"];
              $stateDropdown = $_POST["stateDropdown"];
              $countryDropdown = $_POST["countryDropdown"];
              $whomToMeet = $_POST["whomToMeet"];
              $reason = $_POST["reason"];
              $visitDate = $_POST["visitDate"];
              $visitTime = $_POST["visitTime"];
              $desig = $_POST["desig"];
              $cmpName = $_POST["cmpName"];
              $guide = $_POST["guideBy"];
              $mobile = $_POST["mobileAllowed"];
              $outTime = $_POST["outTime"];
              $foc= "";
              if(!empty($_POST["foc"])){
                foreach($_POST["foc"] as $selected){
                  $foc = $foc.",".$selected;
                }
              }
              $foc = ltrim($foc,',');

              $whatToVisit= "";
              if(!empty($_POST["whatToVisit"])){
                foreach($_POST["whatToVisit"] as $selected){
                  $whatToVisit = $whatToVisit.",".$selected;
                }
              }
              $whatToVisit = ltrim($whatToVisit,',');

              $guideTour= "";
              if(!empty($_POST["guideTour"])){
                foreach($_POST["guideTour"] as $selected){
                  $guideTour = $guideTour.",".$selected;
                }
              }
              $guideTour = ltrim($guideTour,',');
                $queryInsert = "INSERT INTO visitordata (name, contactNo, email, address,
                 above11, upto11, noOfPerson, city, state, country, whomToMeet, reason,
                 dateOfVisit, timeOfVisit,designation, companyName, FOC,
                  mobileAllowed, whatToVisit, guidedTour, guidedBy, logOutTime)
                   VALUES ('$name','$contNo','$emailId','$address',$adultCount,$childCount,
                   $totalCount,'$cityDropdown','$stateDropdown','$countryDropdown','$whomToMeet','$reason'
                   ,'$visitDate','$visitTime','$desig','$cmpName','$foc','$mobile','$whatToVisit','$guideTour','$guide'
                   ,'$outTime');";

                $result = mysqli_query($connect,$queryInsert);
                setcookie("username", $name.$visitDate, time() + (120 * 30), "/");
            }  
            else{
              
            }
        ?>  
        <div class="container">
            <div class="card">
                <div class="card-body">
                <script type="text/javascript" src="assets/webcam/webcam.js">
                </script>
                
                        

                        <!-- Configure a few settings -->
                       
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_api_url('upload.php');
                            webcam.set_quality(100); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                        </script>
                       
                        <!-- Next, write the movie to the page at 320x240 -->
                       
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_swf_url("assets/webcam/webcam.swf");
                            webcam.set_shutter_sound(true, "assets/webcam/shutter.mp3");
                            document.write(webcam.get_html(500, 500));
                        </script>
                        <br><br>
                        <!-- <a href="javascript:void(webcam.snap())">Take SnapShot</a> -->
                        <input type="button" id="Capture" value="Capture The Photo" onClick="capture()">
                        <input type="button" id="Next" value="Continue" onClick="goToNextPage()">
                        <script>
                             document.getElementById("Next").disabled = true;
                        </script>
                        <script>
                          var capture = () =>{
                              webcam.snap();  
                                //   window.location = "http://localhost/akshardham/dashboardNormal.php";
                                document.getElementById("Next").disabled = false;
                          };
                          
                        //   var goToNextPage = () =>{
                        //      // webcam.snap();  
                        //      window.location = "http://localhost/akshardham/dashboardNormal.php";
                               
                        //   };
                        </script> 
                </div>
            </div>
        </div>    
       
</body>
</html>