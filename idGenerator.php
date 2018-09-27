<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include("header.php"); ?>
    <style>
         @page {
            /* dimensions for the whole page */
        size: A5 ;
        }
        @media print {
            body * {
                 visibility: hidden;
            }
            #section-to-print, #section-to-print * {
                visibility: visible;
            }
            #section-to-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    
    </style>
</head>
<body>
<?php include("nav.php"); ?>
        <?php  
          include ('init.php');   
          global $connect;     
          if($_SERVER["REQUEST_METHOD"] == "POST")  
            {  
              $fname = $_POST["fname"];
              $lname = $_POST["lname"];
              $nameTag = $_POST["nameTag"];
              $name = $nameTag." ".$fname." ".$lname;
              $name = strtoupper($name);
              $emailId = $_POST["emailId"];
              $personalNo = $_POST["personalNo"];
              $officeNo = $_POST["officeNo"];
              
              if($_POST['noOfGuest'] == NULL){
                $noOfGuest = 1;
              }else{
                $noOfGuest = $_POST['noOfGuest'];
              }

              if($_POST['cityDropdown'] == "OTHER"){
                $cityDropdown = $_POST['otherCity'];
                $cityDropdown = strtoupper($cityDropdown);
                $insertOther = "insert into city(cityName) values ('$cityDropdown')";
                mysqli_query($connect,$insertOther);
            }else{
                $cityDropdown = $_POST["cityDropdown"];
                $cityDropdown = strtoupper($cityDropdown);
              }

              if($_POST['stateDropdown'] == "OTHER"){
                $stateDropdown = $_POST['otherState'];
                $stateDropdown = strtoupper($stateDropdown);
                $insertOther = "insert into state(stateName) values ('$stateDropdown')";
                mysqli_query($connect,$insertOther);
            }else{
               
                $stateDropdown = $_POST["stateDropdown"];
                $stateDropdown = strtoupper($stateDropdown);
              }

              if($_POST['countryDropdown'] == "OTHER"){
                $countryDropdown = $_POST['otherCountry'];
                $countryDropdown = strtoupper($countryDropdown);
                $insertOther = "insert into country(countryName) values ('$countryDropdown')";
                mysqli_query($connect,$insertOther);
              }else{
                $countryDropdown = $_POST["countryDropdown"];
                $countryDropdown = strtoupper($countryDropdown);
              }

              if($_POST['volunteerDropdown'] == "OTHER"){
                $volunteerDropdown = $_POST['otherVolunteer'];
                $volunteerDropdown = strtoupper($volunteerDropdown);
                $insertOther = "insert into volunteersname(volunName) values ('$volunteerDropdown')";
                mysqli_query($connect,$insertOther);
              }else{
                $volunteerDropdown = $_POST["volunteerDropdown"];
                $volunteerDropdown = strtoupper($volunteerDropdown);
              }
              
              if(isset($_POST['mobile'])){
                 $mobile = "YES";
                 $mobileToken = "";
              }else{
                $mobile = "NO"; 
                $mobileToken = $_POST["mobileToken"]; 
              }

             if(isset($_POST['baggage'])){
                $baggage = "YES";
                $baggageToken = "";
             }else{
               $baggage = "NO";
               $baggageToken = $_POST["baggageToken"];  
             }
              
              if(isset($_POST['ByPass'])){
                $ByPass = "YES";
              }else{
                $ByPass = "NO";
              }

              if(isset($_POST['Parking'])){
                $Parking = "YES";
              }else{
                $Parking = "NO";
              }
              
             
              $reason = $_POST["reason"];
              $reference = $_POST["reference"];
              $vehicleType = $_POST["vehicleType"];
              $vehicleNo = $_POST["vehicleNo"];
              $desig = $_POST["desig"];
              $desig = strtoupper($desig);
              $cmpName = $_POST["cmpName"];
              $cmpName = strtoupper($cmpName);
              $visitDateOLD = $_POST["visitDate"];
              $visitDate = date("d-m-Y",strtotime($visitDateOLD));
              date_default_timezone_set('Asia/Kolkata');
			 if($_POST['arrivalTime'] == "" || $_POST['arrivalTime'] == NULL ){
			 		 $arrivalTime = date('g:i a');
				}else{
					$arrivalTime = $_POST['arrivalTime'];
				 }
             
              $departureTime = $_POST["departureTime"];
                
              if(isset($_COOKIE["imgName"])){
                    $imgName = $_COOKIE["imgName"];
                }else{
                    $imgName = "";
                }
              
              
                setcookie("imgName", "", time() - 3600, "/");

                // $queryInsert = "INSERT INTO visitordata (name, contactNo, email, address,
                //  above11, upto11, noOfPerson, city, state, country, whomToMeet, reason,
                //  dateOfVisit, timeOfVisit,designation, companyName, FOC,
                //  mobileAllowed, whatToVisit, guidedTour, guidedBy, logOutTime,userImage)
                //  VALUES ('$name','$contNo','$emailId','$address',$adultCount,$childCount,
                //  $totalCount,'$cityDropdown','$stateDropdown','$countryDropdown','$whomToMeet','$reason'
                //  ,'$visitDate','$visitTime','$desig','$cmpName','$foc','$mobile','$whatToVisit','$guideTour','$guide'
                //  ,'$outTime','$imgName');";

                $queryInsert = "INSERT INTO visitordata (name,
                personalNo, officeNo, email, noOfPerson, city, state, country, whomToMeet, reason,
                dateOfVisit, arrivalTime, designation,companyName, 
                mobileAllowed,mobileToken,baggage,baggageToken,departureTime, userImage, parking, byPass,vehicleType, vehicleNo, reference) VALUES
                  ('$name','$personalNo','$officeNo','$emailId','$noOfGuest','$cityDropdown','$stateDropdown',
                  '$countryDropdown','$volunteerDropdown','$reason','$visitDateOLD','$arrivalTime','$desig','$cmpName',
                  '$mobile','$mobileToken','$baggage','$baggageToken','$departureTime','$imgName','$Parking','$ByPass','$vehicleType','$vehicleNo', '$reference')";

                $result = mysqli_query($connect,$queryInsert);
            }  
            else{
              echo '<script>window.location="http://localhost/VMS/dashboard1.php"</script>';
            }
        ?> 

            <br><br>
        <div class="container">
            <div class="card" id="section-to-print">
                <div class="card-body">
                    <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-8">
                        <img src="assets/img/logo.png" class="mx-auto d-block" alt="AKD-LOGO" height="40px" weight="80%">  
                    </div>
                    <div class="col-sm-2"></div>
                    </div>
                    <br><br> 
                    <div class="row">
                        <div class="col-sm-3">
                            <!-- image from database will go here -->
                            <?php
                                $folder = 'uploads';
                                $handle = opendir($folder);
                                
                                echo '<img src="'.$folder.'/'.$imgName.'"width="150" height="150"/>';
                            ?>
                        </div>
                        <div class="col-sm-9">
                        <table width="100%">
                                    <tr>
                                        <td ><h5>NAME : <?php echo $name?></h5> </td>
                                        <td style="text-align: center"><h5>DESIGNATION :<?php echo $desig." - ".$cmpName ?> </h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>MOBILE : <?php echo $personalNo?></h5> </td>
                                        <td style="text-align: center"><h5>Total Guests : <?php echo $noOfGuest?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>WHOM TO MEET : <?php echo $volunteerDropdown?></h5> </td>
                                        <td style="text-align: center"><h5>REMARKS : <?php echo $reason?></h5></td>
                                    </tr>
                                    
                                    <tr>
                                        <td ><h5>ARRIVAL : <?php echo $arrivalTime." - ".$visitDate?></h5> </td>
                                        <td style="text-align: center"><h5>DEPARTURE : <?php echo"                    " ?></h5></td>
                                    </tr>

                                    <tr>
                                        <td ><h5>TOKEN : <?php echo $baggageToken." - ".$mobileToken?></h5> </td>
                                        
                                    </tr>
                                    
                                </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input TYPE="button" value="Print" onClick="window.print()">
        <input TYPE="button" value="Continue" onClick="nextPage()">
        <script>
            var nextPage = () => {
                window.location = "http://localhost/VMS/dashboard.php";
            }
        </script>

</body>
</html>