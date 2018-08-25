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
<br><br>
        <div class="container" id="section-to-print">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <!-- image from database will go here -->
                                <?php
                                    $folder = 'uploads';
                                    $handle = opendir($folder);
                                    $imgName = '1535051180.jpg';
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