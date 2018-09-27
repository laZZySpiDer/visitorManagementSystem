<?php 
    include("init.php");
   global $connect;
    $id = "";
    $name = "";
    $desig = "";
    $cmpName = "";
    $emailId = "";
    $noOfGuest = "";
    $personalNo = "";
    $officeNo = "";
    $arrivalTime = "";
    $departureTime = "";
    $mbToken = "";
    $lgToken = "";
    
    function getPosts(){
        $posts = array();
        $posts[0] = $_POST['id'];
        $posts[1] = $_POST['name'];
        $posts[2] = $_POST['desig'];
        $posts[3] = $_POST['cmpName'];
        $posts[4] = $_POST['emailId'];
        $posts[5] = $_POST['noOfGuest'];
        $posts[6] = $_POST['personalNo'];
        $posts[7] = $_POST['officeNo'];
        $posts[8] = $_POST['arrivalTime'];
        $posts[9] = $_POST['departureTime'];
        $posts[10] = $_POST['reason'];
        $posts[11] = $_POST['visitDate'];
        $posts[12] = $_POST['mbToken'];
        $posts[13] = $_POST['lgToken'];
        return $posts;
    }

    if(isset($_POST['search']))
    {
        $data = getPosts();
        $id = $data[0];
        $searchQuery = "SELECT * FROM visitorData WHERE visitorId='$data[0]'";
        $searchResult = mysqli_query($connect,$searchQuery);

        if($searchResult){
            if(mysqli_num_rows($searchResult)){
                while($row = mysqli_fetch_array($searchResult)){
                    $id = $row['visitorId'];
                    $name = $row['name'];
                    $desig = $row['designation'];
                    $cmpName = $row['companyName'];
                    $emailId = $row['email'];
                    $noOfGuest = $row['noOfPerson'];
                    $personalNo = $row['personalNo'];
                    $officeNo = $row['officeNo'];
                    // $arrivalTime = $row[''];
                    // $departureTime = $row[''];
                }
            }else{
                echo '<script>alert("No Data for this ID")</script>';
            }
        }else{
                echo 'Result Error';
        }

    }

    if(isset($_POST['submitData'])){
        $data = getPosts();
        if(isset($_COOKIE["imgName"])){
            $imgName = $_COOKIE["imgName"];
        }else{
            $imgName = "";
        }
        
        
       
      
        setcookie("imgName", "", time() - 3600, "/");


        $update_Query = "UPDATE visitordata SET name='$data[1]',personalNo='$data[6]',
        officeNo='$data[7]',email='$data[4]',noOfPerson=$data[5],reason='$data[10]',
        dateOfVisit='$data[11]',arrivalTime='$data[8]',designation='$data[2]',
        companyName='$data[3]',mobileToken='$data[12]',baggageToken='$data[13]',
        departureTime='$data[9]',
        userImage='$imgName' WHERE visitorId=$data[0]";
        try{
            $updateResult = mysqli_query($connect,$update_Query);
            // echo '<script>alert("'.$data[0].'")</script>';
            if($updateResult){
                if(mysqli_affected_rows($connect) > 0){
                    echo '<script>alert("Data Updated")</script>';
                }else{
                    echo '<script>alert("Not Updated")</script>';
                }
            }

        }catch(Exception $ex){
            echo '<script>alert("Wrong Credentials")</script>';
        }
    }

?>


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


    <br><br>
    <!-- main content goes here -->
    <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4">
                        
                       
                        <br>
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_api_url('upload.php');
                            webcam.set_quality(100); // JPEG quality (1 - 100)
                            webcam.set_shutter_sound(true); // play shutter click sound
                        </script>
                       
                        <!-- Next, write the movie to the page at 320x240 -->
                       
                        <script language="JavaScript" type="text/javascript">
                            webcam.set_swf_url("assets/webcam/webcam.swf");
                            webcam.set_shutter_sound(true, "assets/webcam/shutter.mp3");
                            document.write(webcam.get_html(400, 420));
                        </script>
                        <br><br>
                        <!-- <a href="javascript:void(webcam.snap())">Take SnapShot</a> -->
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <input type="button" id="Capture" value="CAPTURE THE PHOTO" class="btn btn-primary " onClick="capture()">
                            </div>
                            <div class="col-sm-3"></div>
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
                    <form action="guestEntryUpdate.php"  method="post">
                        <div class="row">
                            <div class="col-sm-4"></div>
                           <div class="col-sm-4">
                                <input type="number" class="form-control" name="id" value="<?php echo $id ?>" placeholder="Enter ID" id="id">
                           </div>
                           <div class="col-sm-4">
                                 <input type="submit" class="primarybtn btn" id="search" name="search" value="Search">
                           </div>      
                        </div>
                        <br><br>
                        
                        <!-- FULL NAME -->
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="fname"><strong>FULL NAME</strong></label>
                                    </div>
                                    <div class="col-sm-10">
                                        <input type="text" value="<?php echo $name ?>" name="name" id="name" placeholder="Full Name" class="form-control" autofocus>
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
                                        <input type="text" value="<?php echo $desig ?>" name="desig" id="desig" placeholder="Designation" class="form-control">
                                    </div>
                                </div>     
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cmpName"><strong>COMPANY</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="cmpName" value="<?php echo $cmpName ?>" id="cmpName" placeholder="Company Name" class="form-control">
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
                                        <input type="email" value="<?php echo $emailId ?>" name="emailId" id="emailId" placeholder="Email Id" class="form-control" >
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>NO OF GUEST</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" name="noOfGuest" value="<?php echo $noOfGuest ?>"  id="noOfGuest" placeholder="No Of Guest" class="form-control">
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
                                        <label for="fname"><strong>MOBILE NO.</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="personalNo" value="<?php echo $personalNo ?>" id="personalNo" placeholder="Mobile No." class="form-control" >
                                    </div>
                                </div>                            
                            </div>

                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="fname"><strong>OFFICE NO</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                    <input type="number" name="officeNo" value="<?php echo $officeNo ?>" id="officeNo" placeholder="Office No." class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> 
                          
                         <!--  Luggage AND mobile TOKEN-->
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="desig"><strong>MOBILE TOKEN</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text"  name="mbToken" id="mbToken" placeholder="Mobile Token" class="form-control">
                                    </div>
                                </div>     
                            </div>
                            <div class="form-group col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="cmpName"><strong>LUGGAGE TOKEN</strong></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="text" name="lgToken"  id="lgToken" placeholder="Luggage Token" class="form-control">
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
                        <button type="submit" name="submitData" id="submitData" class="btn btn-primary btn-lg btn-block">UPDATE</button>                      
                        <br> 

                        <!-- js script for dropdown changes and checkbox changes method -->
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