<!DOCTYPE html>
<html>
<head>
	<title>Update Entry</title>
    <?php include('header.php') ?>
</head>
<body>
    <?php include('nav.php') ?>
    <?php include('init.php');
        global $connect;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-6">
                        <select name="drp" onchange="editable()" id="drp">
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="getValue" id="getValue">
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <script>
        function editable() {
            if(document.getElementById("drp").value === "Other"){
                document.getElementById("getValue").disabled = false;
            }else{
                document.getElementById("getValue").disabled = true;
            }
            
        }
        

    </script>
	<form method="post" action="server.php" >
		
	</form>
</body>
</html>