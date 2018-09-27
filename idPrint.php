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
        $posts[0] = $_GET['searchId'];
        return $posts;
    }

    if(isset($_GET['search']))
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
                    $whomToMeet = $row['whomToMeet'];
                    $reason = $row['reason'];
                    $arrivalTime = $row['arrivalTime'];
                    $visitDate = $row['dateOfVisit'];
                    $baggageToken = $row['baggageToken'];
                    $mobileToken = $row['mobileToken'];
                    $imgName = $row['userImage'];
                    // $arrivalTime = $row[''];
                    // $departureTime = $row[''];
                }
            }else{
                echo 'No Data for this ID';
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
        
        echo '<script>alert("'.$data[0].'")</script>';
       
      
        setcookie("imgName", "", time() - 3600, "/");


        $update_Query = "UPDATE visitordata SET name='$data[1]',personalNo=$data[6],
        officeNo=$data[7],email='$data[4]',noOfPerson=$data[5],reason='$data[10]',
        dateOfVisit=$data[11],arrivalTime='$data[8]',designation='$data[2]',
        companyName='$data[3]',mobileToken=$data[12],baggageToken=$data[13],
        departureTime='$data[9]',
        userImage='$imgName' WHERE visitorId=$data[0]";
        try{
            $updateResult = mysqli_query($connect,$update_Query);
            echo '<script>alert("'.$imgName.'")</script>';
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

<!DOCTYPE html moznomarginboxes mozdisallowselectionprint>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRINT ID</title>
    <?php include("header.php"); ?>
    <style>
         @page {
            /* dimensions for the whole page */
        size: A5 portrait;
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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <form action="idPrint.php" method="GET">
                    <div class="row">
                        <div class="col-sm-9">
                            <input type="text" name="searchId" id="searchId" placeholder="Search ID" class="form-control">
                        </div>
                        <div class="col-sm-3">
                            <input type="submit" name="search" class="form-control btn btn-primary" id="search" value="Search">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
        <br><br>
        <div class="row">
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
                                        <td ><h5>WHOM TO MEET : <?php echo $whomToMeet?></h5> </td>
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
    </div>
</body>
</html>