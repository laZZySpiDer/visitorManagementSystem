<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/bootstrap.css"/>
    <link rel="stylesheet" href="assets/dataTables.bootstrap4.min.css"/>
    <script src="assets/jquery-3.3.1.js"></script>
    <script src="assets/jquery.dataTables.min.js"></script>
    <script src="assets/dataTables.bootstrap4.min.js"></script>
   
</head>
<body>
<?php include("navAdmin.php"); ?>
   
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="row">
                            <!-- <div class="col-sm-4">
                                <input type="date" name="startDate" class="form-control" id="startDate">  
                            </div>
                            <div class="col-sm-4">
                                <input type="date" name="endDate" class="form-control" id="endDate">
                            </div> -->
                            <div class="col-sm-12">
                                <input type="text" name="nameSearch" class="form-control" id="searchText">
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-sm-3">
                        <select name="searchCriteria" id="searchCriteria" class="form-control">
                            <option value="name">NAME</option>
                            <option value="reference">REFERENCE</option>
                            <option value="companyName">COMPANY</option>
                            <option value="designation">DESIGNATION</option>
                            <option value="city">CITY</option>
                            <option value="state">STATE</option>
                            <option value="country">COUNTRY</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="button" id="buttonSearch" class="btn primary-btn" value="Search"/>
                    </div>
                </div>
                
                
            </div>
            <div class="col-sm-3"></div>
        </div>
        <br><br>
        <div class="table-responsive">
           <table class="table table-striped table-bordered" id="visitorData">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Phone No.</td>
                        <td>Reference</td>
                        <td>No of Guest</td>
                        <td>City - Country</td>
                        <td>Mobile Allowed?</td>
                        <td>Visit Date</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
           </table>
        </div>       
    </div>

    <script>

    // function to be called when the page load event occurs
    $ ( document ).ready(function() {    
        
        $.ajax({
            type: 'GET',
            url: 'getAllData.php',
            mimeType: 'json',
            success: function(data) {
                $.each(data, function(i, data) {
                    var body = "<tr>";
                    body    += "<td>" + data.visitorId + "</td>";
                    body    += "<td>" + data.name + "</td>";
                    body    += "<td>" + data.email + "</td>";
                    body    += "<td>" + data.personalNo + "</td>";
                    body    += "<td>" + data.reference + "</td>";
                    body    += "<td>" + data.noOfPerson + "</td>";
                    body    += "<td>" + data.city + " - " + data.country +"</td>";
                    body    += "<td>" + data.mobileAllowed + "</td>";
                    body    += "<td>" + data.dateOfVisit + "</td>";
                    body    += "</tr>";
                    
                    $( "#visitorData tbody" ).append(body);
                });
            /*DataTables instantiation.*/
                $( "#visitorData" ).DataTable();
            },
            error: function() {
            alert('No New Entry Today');
            }
        });

        function search(){
            var title = $("#searchText").val();
            var criteria = $("#searchCriteria").val();
            if(title !=""){
               
                $.ajax({
                    type : "POST",
                    url : "specificSearch.php",
                    data : {title: title,criteria: criteria},
                    mimeType: 'json',
                    success : function(data){
                        $( "#visitorData tbody" ).empty();
                        $.each(data, function(i, data) {
                            var body = "<tr>";
                            body    += "<td>" + data.visitorId + "</td>";
                            body    += "<td>" + data.name + "</td>";    
                            body    += "<td>" + data.email + "</td>";
                            body    += "<td>" + data.personalNo + "</td>";
                            body    += "<td>" + data.reference + "</td>";
                            body    += "<td>" + data.noOfPerson + "</td>";
                            body    += "<td>" + data.city + " - " + data.country +"</td>";
                            body    += "<td>" + data.mobileAllowed + "</td>";
                            body    += "<td>" + data.dateOfVisit + "</td>";
                            body    += "</tr>";
                            $( "#visitorData tbody" ).append(body);
                        });
                        
                         $( "#visitorData" ).DataTable();
                    },
                    error : function(){
                        alert('Fail!');
                    }
                });
            }else{
                alert('Please Enter something before searching.'); 
            }
        }

        //function to be called when search button is clicked
        $("#buttonSearch").click(function(){
            search();
        });
    });

    


</script>
</body>
</html>