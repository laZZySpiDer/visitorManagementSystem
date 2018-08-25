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
        size: A5 landscape;
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
                $imgName = $_COOKIE["imgName"];
                 setcookie("imgName", "", time() - 3600, "/");
                $queryInsert = "INSERT INTO visitordata (name, contactNo, email, address,
                 above11, upto11, noOfPerson, city, state, country, whomToMeet, reason,
                 dateOfVisit, timeOfVisit,designation, companyName, FOC,
                  mobileAllowed, whatToVisit, guidedTour, guidedBy, logOutTime,userImage)
                   VALUES ('$name','$contNo','$emailId','$address',$adultCount,$childCount,
                   $totalCount,'$cityDropdown','$stateDropdown','$countryDropdown','$whomToMeet','$reason'
                   ,'$visitDate','$visitTime','$desig','$cmpName','$foc','$mobile','$whatToVisit','$guideTour','$guide'
                   ,'$outTime','$imgName');";

                $result = mysqli_query($connect,$queryInsert);
            }  
            else{
              echo '<script>window.location="http://localhost/VMS/dashboard1.php"</script>';
            }
        ?> 

            <br><br>
        <div class="container">
            <div class="card">
                <div class="card-body">
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
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>
                                    <tr>
                                        <td ><h5>Name : <?php echo 'Aditya Pandya'?></h5> </td>
                                        <td style="text-align: right"><h5>ID : <?php echo '461481'?></h5></td>
                                    </tr>

                                </table>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input TYPE="button" value="Print" onClick="window.print()">
</body>
</html>