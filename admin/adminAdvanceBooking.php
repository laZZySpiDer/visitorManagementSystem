<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GUEST BOOKING</title>
    <?php include("headerAdmin.php"); ?>
</head>
<body>
<?php include("navAdmin.php"); ?>
<?php include("../init.php");
   global $connect;
?>

    <br><br>
    <!-- main content goes here -->
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_api_url('../upload.php');
                            webcam.set_quality(100); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                        </script>
                       
                        <!-- Next, write the movie to the page at 320x240 -->
                       
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_swf_url("../assets/webcam/webcam.swf");
                            webcam.set_shutter_sound(true, "../assets/webcam/shutter.mp3");
                            document.write(webcam.get_html(420, 420));
                        </script>
                        <br><br>
                        <!-- <a href="javascript:void(webcam.snap())">Take SnapShot</a> -->
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <input type="button" id="Capture" value="CAPTURE THE PHOTO" class="btn btn-primary " onClick="capture()">    
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        
                        <script> 
                            var capture = () =>{
                              webcam.snap();  
                            //   document.getElementById("submitData").disabled = false;
                              document.getElementById("Capture").disabled = true;
                            };
                        </script>
                </div>
                <div class="col-sm-8">
                    <form action="uploadGuest.php"  method="post">
                        
                        <!-- FULL NAME -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>FIRST NAME</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-4">
                                            <select name="nameTag" class="form-control" id="nameTag">
                                                <option value=""></option>
                                                <option value="Mr.">Mr.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Dr.">Dr.</option>
                                            </select>
                                            </div>
                                            <div class="col-sm-8">
                                            <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required autofocus>    
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname"><strong>LAST NAME</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!--  DESIGNATION AND COMPANY NAME-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="desig"><strong>DESIGNATION</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="desig" id="desig" placeholder="Designation" class="form-control">
                                    </div>
                                </div>     
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cmpName"><strong>COMPANY</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="cmpName" id="cmpName" placeholder="Company Name" class="form-control">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                        <!-- Email Id and no. of guest-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                             <div class="row">
                                    <div class="col-sm-4">
                                        <label for="emailId"><strong>EMAIL ID</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="email" name="emailId" id="emailId" placeholder="Email Id" class="form-control" >
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>NO OF GUEST</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" name="noOfGuest"  id="noOfGuest" placeholder="No Of Guest" class="form-control">
                                    </div>
                                </div>
                                <!-- <label for="fname">Contact Number</label>
                                <input type="number" name="contNo" id="contNo" placeholder="Enter your Contact Number" class="form-control" required> -->
                            </div>
                        </div>

                        <!-- Mobile No and office no -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                             <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>MOBILE NO</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="personalNo" id="personalNo" placeholder="Mobile No." class="form-control" >
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>OFFICE NO</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="officeNo" id="officeNo" placeholder="Office No." class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <!-- city & state  -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">  
                                        <label for="fname"><strong>CITY</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="cityDropdown" onchange="cityChange()" data-live-search="true" id="cityDropdown" class="form-control">
                                                <option value=""></option>
                                                <?php  

                                                    $query = "select cityName from city ORDER BY cityName ASC";
                                                    $result = mysqli_query($connect,$query);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $array[] = $row;
                                                    echo '<option value="'.$row['cityName'].'">'.$row['cityName'].'</option>';
                                                    }
                                                // mysqli_close($connect);
                                                ?>
                                                <option>OTHER</option>
                                                </select>  
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="otherCity" class="form-control" id="otherCity">
                                            </div>
                                        </div>
                                                  
                                    </div>
                                </div>
                              
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">  
                                        <label for="fname"><strong>STATE</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="stateDropdown" onchange="stateChange()" data-live-search="true" id="stateDropdown" class="form-control">
                                                <option value="GUJARAT">GUJARAT</option>
                                                <?php  

                                                    $query = "select stateName from state ORDER BY stateName ASC";
                                                    $result = mysqli_query($connect,$query);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $array[] = $row;
                                                    echo '<option value="'.$row['stateName'].'">'.$row['stateName'].'</option>';
                                                    }
                                                // mysqli_close($connect);
                                                ?>
                                                <option>OTHER</option>
                                                </select>  
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="otherState" class="form-control" id="otherState">
                                            </div>
                                        </div>
                                                  
                                    </div>
                                </div>
                                <!-- <label for="fname">Contact Number</label>
                                <input type="number" name="contNo" id="contNo" placeholder="Enter your Contact Number" class="form-control" required> -->
                            </div>
                        </div>    
                        
                        <!-- country and other allowing items -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                        <div class="col-sm-4">  
                                            <label for="fname"><strong>COUNTRY</strong></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <select name="countryDropdown" onchange="countryChange()" data-live-search="true" id="countryDropdown" class="form-control">
                                                    <option value="INDIA">INDIA</option>
                                                    <?php  

                                                        $query = "select countryName from country ORDER BY countryName ASC";
                                                        $result = mysqli_query($connect,$query);
                                                        while($row = mysqli_fetch_assoc($result)){
                                                        $array[] = $row;
                                                        echo '<option value="'.$row['countryName'].'">'.$row['countryName'].'</option>';
                                                        }
                                                    // mysqli_close($connect);
                                                    ?>
                                                    <option>OTHER</option>
                                                    </select>  
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="otherCountry" class="form-control" id="otherCountry">
                                                </div>
                                            </div>
                                                    
                                        </div>
                                    </div>                 
                            </div>
                            <div class="col-sm-2"></div>                                
                            <div class="form-group col-md-4">
                               <div class="">
                                    <div class="">
                                    <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="Parking" name="Parking" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox3"><strong>PARKING</strong></label>
                                        </div>   
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="ByPass" name="ByPass" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox2"><strong>BP</strong></label>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                               </div>
                                                            
                                
                               
                                             
                            </div>

                        </div>
                        
                        <!-- Mobile allowance and baggage allowance -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" onchange="onMobileAllowed()" id="mobile" name="mobile" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox3"><strong>MOBILE</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="mobileToken" id="mobileToken" placeholder="Mobile Token" class="form-control"    >
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" onchange="onBaggageAllowed()" id="baggage" name="baggage" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox3"><strong>BAGGAGE</strong></label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="baggageToken" id="baggageToken" placeholder="Baggage Token" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- whom to meet and reference -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname"><strong>TO MEET</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                    <select name="volunteerDropdown" onchange="volunteerChange()" data-live-search="true" id="volunteerDropdown" class="form-control">
                                                    <?php  

                                                        $query = "select volunName from volunteersname ORDER BY volunName ASC";
                                                        $result = mysqli_query($connect,$query);
                                                        while($row = mysqli_fetch_assoc($result)){
                                                        $array[] = $row;
                                                        echo '<option value="'.$row['volunName'].'">'.$row['volunName'].'</option>';
                                                        }
                                                    // mysqli_close($connect);
                                                    ?>
                                                    <option>OTHER</option>
                                                    </select>  
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" name="otherVolunteer" class="form-control" id="otherVolunteer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname"><strong>REFERENCE</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" name="reference" id="reference" placeholder="Reference" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!-- Vehicle type and vehicle no -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-5">
                                    <label for="fname"><strong>VEHICLE TYPE</strong></label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select name="vehicleType"  id="vehicleType" class="form-control">
                                            <option>2 Wheeler</option>
                                            <option>3 Wheeler</option>
                                            <option>4 Wheeler</option>
                                            <option>Truck</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname"><strong>VEHICLE NO</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" name="vehicleNo" id="vehicleNo" placeholder="Vehicle No." class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                         <!--   VISIT DATE AND TIME-->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fname"><strong>VISIT DATE</strong></label>
                                <input type="date" name="visitDate" id="visitDate" class="form-control">
                                <script>document.getElementById('visitDate').valueAsDate = new Date();</script>                              
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fname"><strong>ARRIVAL TIME</strong></label>
                                <input type="time" name="arrivalTime" id="arrivalTime" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fname"><strong>DEPARTURE TIME</strong></label>
                                <input type="time" name="departureTime" id="departureTime" class="form-control">
                            </div>
                        </div> 
                        
                        <!-- Remarks -->
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                    <label for="fname"><strong>REMARKS</strong></label>
                                    </div>
                                    <div class="col-sm-10">
                                    <input type="text" name="reason" id="reason" placeholder="Remarks" class="form-control" >
                                    </div>
                                </div>        
                            </div>
                        </div>                       
                        <!-- <input type="button" value="SUBMIT" class="btn btn-primary btn-lg btn-block"> -->
                        <button type="submit" name="submitData" id="submitData" class="btn btn-primary btn-lg btn-block">SUBMIT</button>                      
                        <br> 
                        <script>
                            document.getElementById("submitData").disabled = false;
                            document.getElementById("otherCity").disabled = true;
                            document.getElementById("otherState").disabled = true;
                            document.getElementById("otherCountry").disabled = true;
                            document.getElementById("otherVolunteer").disabled = true;
                            
                            var onMobileAllowed = () => {
                                if (document.getElementById("mobile").checked){
                                    document.getElementById("mobileToken").disabled = true;
                                    document.getElementById("mobileToken").value = "";
                                    
                                }else{
                                    document.getElementById("mobileToken").disabled = false;
                                }
                            }

                            var onBaggageAllowed = () => {
                                if (document.getElementById("baggage").checked){
                                    document.getElementById("baggageToken").disabled = true;
                                    document.getElementById("baggageToken").value = "";
                                }else{
                                    document.getElementById("baggageToken").disabled = false;
                                }
                            }

                            var cityChange = () => {
                                if(document.getElementById("cityDropdown").value === "OTHER"){
                                    document.getElementById("otherCity").disabled = false;
                                }else{
                                    document.getElementById("otherCity").disabled = true;
                                }
                            }
                            
                            var stateChange = () => {
                                if(document.getElementById("stateDropdown").value === "OTHER"){
                                    document.getElementById("otherState").disabled = false;
                                }else{
                                    document.getElementById("otherState").disabled = true;
                                }
                            }

                            var countryChange = () => {
                                if(document.getElementById("countryDropdown").value === "OTHER"){
                                    document.getElementById("otherCountry").disabled = false;
                                }else{
                                    document.getElementById("otherCountry").disabled = true;
                                }
                            }

                            var volunteerChange = () => {
                                if(document.getElementById("volunteerDropdown").value === "OTHER"){
                                    document.getElementById("otherVolunteer").disabled = false;
                                }else{
                                    document.getElementById("otherVolunteer").disabled = true;
                                }
                            }
                            
                        </script>                   
                    </form>    
                </div>
                
            </div>
        </div>     
      
</body>
</html>