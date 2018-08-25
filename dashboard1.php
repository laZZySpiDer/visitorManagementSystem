<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard : VSM</title>
    <?php include("header.php"); ?>
</head>
<body>
<?php include("nav.php"); ?>
<?php include("init.php");
   global $connect
?>

    <br><br>
    <!-- main content goes here -->
    <div class="container">
            <div class="row">
                <div class="col-sm-4">
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_api_url('upload.php');
                            webcam.set_quality(100); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                        </script>
                       
                        <!-- Next, write the movie to the page at 320x240 -->
                       
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_swf_url("assets/webcam/webcam.swf");
                            webcam.set_shutter_sound(true, "assets/webcam/shutter.mp3");
                            document.write(webcam.get_html(320, 240));
                        </script>
                        <br><br>
                        <!-- <a href="javascript:void(webcam.snap())">Take SnapShot</a> -->
                        <input type="button" id="Capture" value="Capture The Photo" onClick="capture()">
                        <script> 
                            var capture = () =>{
                              webcam.snap();  
                              document.getElementById("submitData").disabled = false;
                            };
                        </script>
                </div>
                <div class="col-sm-8">
                    <form action="idGenerator.php"  method="post">
                        
                        <!-- FULL NAME -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname">First Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required autofocus>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname">Last Name</label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" name="lname" id="lname" placeholder="Last Name" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <!-- Email Id and no. of guest-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                             <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname">Email Id</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="email" name="emailId" id="emailId" placeholder="Email Id" class="form-control" >
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname">No. of Guest</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" name="noOfGuest"  id="noOfGuest" placeholder="No Of Guest" class="form-control">
                                    </div>
                                </div>
                                <!-- <label for="fname">Contact Number</label>
                                <input type="number" name="contNo" id="contNo" placeholder="Enter your Contact Number" class="form-control" required> -->
                            </div>
                        </div>

                        <!-- Personal No and office no -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                             <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname">Personal No.</label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="contNo" id="contNo" placeholder="Personal No." class="form-control" required>
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname">Office No.</label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="contNo" id="contNo" placeholder="Office No." class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        
                        <!-- city & state  -->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">  
                                        <label for="fname">City</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="cityDropdown" onchange="cityChange()" data-live-search="true" id="cityDropdown" class="form-control">
                                                <?php  

                                                    $query = "select cityName from city ORDER BY cityName ASC";
                                                    $result = mysqli_query($connect,$query);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $array[] = $row;
                                                    echo '<option value="'.$row['cityName'].'">'.$row['cityName'].'</option>';
                                                    }
                                                // mysqli_close($connect);
                                                ?>
                                                <option>Other</option>
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
                                        <label for="fname">State</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="cityDropdown" onchange="stateChange()" data-live-search="true" id="stateDropdown" class="form-control">
                                                <?php  

                                                    $query = "select cityName from city ORDER BY cityName ASC";
                                                    $result = mysqli_query($connect,$query);
                                                    while($row = mysqli_fetch_assoc($result)){
                                                    $array[] = $row;
                                                    echo '<option value="'.$row['cityName'].'">'.$row['cityName'].'</option>';
                                                    }
                                                // mysqli_close($connect);
                                                ?>
                                                <option>Other</option>
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
                                            <label for="fname">Country</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <select name="cityDropdown" onchange="countryChange()" data-live-search="true" id="countryDropdown" class="form-control">
                                                    <?php  

                                                        $query = "select cityName from city ORDER BY cityName ASC";
                                                        $result = mysqli_query($connect,$query);
                                                        while($row = mysqli_fetch_assoc($result)){
                                                        $array[] = $row;
                                                        echo '<option value="'.$row['cityName'].'">'.$row['cityName'].'</option>';
                                                        }
                                                    // mysqli_close($connect);
                                                    ?>
                                                    <option>Other</option>
                                                    </select>  
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" name="otherCountry" class="form-control" id="otherCountry">
                                                </div>
                                            </div>
                                                    
                                        </div>
                                    </div>                 
                            </div>
                            <div class="col-sm-1"></div>                                
                            <div class="form-group col-md-5">
                               <div class="card">
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="Mobile" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox1">Mobile</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="ByPass" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox2">ByPass</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="Parking" value="Yes">
                                            <label class="form-check-label" for="inlineCheckbox3">Parking</label>
                                        </div>   
                                    </div>
                                </div>
                                    </div>
                               </div>
                                                            
                                
                               
                                             
                            </div>

                        </div>


                        <!-- whom to meet and reason -->
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-5">
                                    <label for="fname">Whom To Meet</label>
                                    </div>
                                    <div class="col-sm-7">
                                        <select name="whomToMeet"  id="whomToMeet" class="form-control">
                                            <?php  
                                            
                                            $query = "select volunName from volunteersName ORDER BY volunName ASC";
                                            $result = mysqli_query($connect,$query);
                                            while($row = mysqli_fetch_assoc($result)){
                                            $array[] = $row;
                                            echo '<option value="'.$row['volunName'].'">'.$row['volunName'].'</option>';
                                            }
                                            // mysqli_close($connect);
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-group col-sm-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                    <label for="fname">Reason</label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="text" name="lname" id="lname" placeholder="Reason" class="form-control" >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                        <!--  DESIGNATION AND COMPANY NAME-->
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="desig">Designation</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="desig" id="desig" placeholder="Enter your Designation" class="form-control">
                                    </div>
                                </div>     
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cmpName">Company</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="cmpName" id="cmpName" placeholder="Company Name" class="form-control">
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div> 


                         <!--   VISIT DATE AND TIME-->
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="fname">Visit Date</label>
                                <input type="date" name="visitDate" id="visitDate" class="form-control">
                                <script>document.getElementById('visitDate').valueAsDate = new Date();</script>                              
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fname">Arrival Time</label>
                                <input type="time" name="visitTime" id="visitTime" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fname">Departure Time</label>
                                <input type="time" name="visitTime" id="visitTime" class="form-control">
                            </div>
                        </div> 
                                                
                        <!-- <input type="button" value="SUBMIT" class="btn btn-primary btn-lg btn-block"> -->
                        <button type="submit" name="submitData" id="submitData" class="btn btn-primary btn-lg btn-block">SUBMIT</button>                      
                        <br> 
                        <script>
                            document.getElementById("submitData").disabled = true;
                            document.getElementById("otherCity").disabled = true;
                            document.getElementById("otherState").disabled = true;
                            document.getElementById("otherCountry").disabled = true;

                            var cityChange = () => {
                                if(document.getElementById("cityDropdown").value === "Other"){
                                    document.getElementById("otherCity").disabled = false;
                                }else{
                                    document.getElementById("otherCity").disabled = true;
                                }
                            }
                            
                            var stateChange = () => {
                                if(document.getElementById("stateDropdown").value === "Other"){
                                    document.getElementById("otherState").disabled = false;
                                }else{
                                    document.getElementById("otherState").disabled = true;
                                }
                            }

                            var countryChange = () => {
                                if(document.getElementById("countryDropdown").value === "Other"){
                                    document.getElementById("otherCountry").disabled = false;
                                }else{
                                    document.getElementById("otherCountry").disabled = true;
                                }
                            }
                            
                        </script>                   
                    </form>    
                </div>
                
            </div>
        </div>     
      
</body>
</html>