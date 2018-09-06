<?php  
          include ('../init.php');   
          global $connect;     
          if($_SERVER["REQUEST_METHOD"] == "POST")  
            {  
              $fname = $_POST["fname"];
              $lname = $_POST["lname"];
              $name = $fname." ".$lname;
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
              $cmpName = $_POST["cmpName"];
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
                echo '<script>window.location="http://localhost/VMS/admin/dashboardAdmin.php"</script>';
            }  
            else{
              echo '<script>window.location="http://localhost/VMS/admin/adminAdvanceBooking.php"</script>';
            }
        ?> 