<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>
        Thanks for registering with us.
    </title>
    <link rel="icon" type="image/ico" href="meswa.jpg" />
    <style>
        lable{
            text-align:center;
            padding:15px;
        }
        .form1{
            margin-left:15px;
            margin-right:15px;
            height:200px;
        }
    </style>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="style.css" />

</head>
<body>
<?php $FirstName=""; ?>

<div class="container">

    <div class="row">

        <div class="col-md-0 col-lg-3"></div>
        <div class="col-md-12 col-lg-6 form1">

            <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4 user-img">

                    <center>  <img src="meswa.jpg" class="pic" alt="meswa pic" align="middle"> </center>

                </div>
                <div class="col-sm-4">

                </div>
            </div>
            <div class="row">

                <lable> <h5 style="text-align:center;"> THANKS <?php echo $FirstName; ?>  FOR REGISTRING WITH MESWA FRATERNITY.</h5> </lable>


            </div>
        </div>
        <div class="col-md-0 col-lg-3"></div>





    </div>
</div>

</body>
</html>