<!DOCTYPE html>
<html lang="en-US">

<head>

    <title>meswa signup</title>
    <link rel="icon" type="image/ico" href="meswa.jpg" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet"  href="js/bootstrap.js"/>
    <link rel="stylesheet" href="style.css" />

</head>
<body>














<?php

//$servername = "localhost:3306";
//$username = "martinmu_martin";
//$password = "0792020946m";
//$dbname = "martinmu_meswa";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "meswa";


// Create connection
$conn = new mysqli($servername, $username, $password , $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


//------------------------------------------------------------------------------



$FirstName = $LastName = $error = $error1 = $OtherName = $RegNo = $PhoneNo = $Position = $Constituency = $Year = $Gender = $Email ="";
$FirstNameErr = $LastNameErr = $OtherNameErr = $RegNoErr = $PhoneNoErr = $PositionErr = $ConstituencyErr = $YearErr = $GenderErr = $EmailErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstname"])) {
        $FirstNameErr = "*FirstName is required";
    } else {
        $FirstName = test_input($_POST["firstname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$FirstName)) {
            $FirstName="";
            $FirstNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["lastname"])) {
        $LastNameErr = "*LastName is required";
    } else {
        $LastName = test_input($_POST["lastname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$LastName)) {
            $LastName = "";
            $LastNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["othername"])) {
        $OtherNameErr = "";
    } else {
        $OtherName = test_input($_POST["othername"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$OtherName)) {
            $OtherName = "";
            $OtherNameErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["email"])) {
        $EmailErr = "";
    } else {
        $Email = test_input($_POST["email"]);

    }

    if (empty($_POST["regno"])) {
        $RegNoErr = "*Regestration number is required";
    } else {
        $RegNo = test_input($_POST["regno"]);

    }

    if (empty($_POST["phonenumber"])) {
        $PhoneNoErr = "*Phone number is required";
    } else {
        $PhoneNo = test_input($_POST["phonenumber"]);
        //for 07.....
        if(strlen($PhoneNo)==10){
            $PhoneNo = substr($PhoneNo,1);
            $PhoneNo = '+254'.$PhoneNo;
            //echo $PhoneNo;
        }
        if(strlen($PhoneNo)==12){
            $PhoneNo = '+'.$PhoneNo;
            //echo $PhoneNo;
        }
        if (!preg_match('/^(?:254|\+254|0)?(7(?:(?:[12345678][0-9])|(?:0[0-8])|(9[0-9]))[0-9]{6})$/',$PhoneNo)) {
            $PhoneNo = "";
            $PhoneNoErr = "*Enter a valid phonenumber";
        }
    }

    if (empty($_POST["position"])) {
        $PositionErr = "*Position is required";
    } else {
        $Position = test_input($_POST["position"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Position)) {
            $Position = "";
            $PositionErr = "Only letters and white space allowed";
        }
    }

    if (empty($_POST["constituency"])) {
        $ConstituencyErr = "*Constituency is required";
    } else {
        $Constituency = test_input($_POST["constituency"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$Constituency)) {
            $Constituency = "";
            $ConstituencyErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["gender"])) {
        $GenderErr = "*gender is required";
    } else {
        $Gender = test_input($_POST["gender"]);

    }

    if (empty($_POST["year"])) {
        $YearErr = "*Year is required";
    } else {
        $Year = test_input($_POST["year"]);
        // check if name only contains letters and whitespace
    }




//---------------------------------------------------------

    if(empty($FirstName) || empty($LastName) || empty($PhoneNo) || empty($RegNo) || empty($Position) || empty($Constituency) || empty($Year) || empty($Gender) )
    {
        $error="YOU MUST FILL ALL SPACES!";
    } else {
        $sql = "insert into lists set FIRSTNAME = '$FirstName', LASTNAME = '$LastName', OTHERNAME='$OtherName', PHONENO = '$PhoneNo', REGNO='$RegNo',
              POSITION='$Position',CONSTITUENCY ='$Constituency' , YEAR='$Year', GENDER = '$Gender' ,EMAIL = '$Email' ;" ;
        //echo "$sql";

        if (mysqli_query($conn ,$sql)){
            echo "<br>";
            $error1 = "RECORD ADDED";
//	header("Location: last.php");
            echo '<script type="text/javascript">
                             window.location = "http://www.martinmuthomi.co.ke/last.php";
                       
                           </script>';

        } else {

            $error1 = "YOU ARE ALREADY IN THE SYSTEM";
        }
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtoupper($data);
    return $data;
}


//  $result = $this->db->query($sql);



//---------------------------------------------------------


?>



















<div class="container">

    <div class="row">
        <div class="col-lg-3 col-md-2 col-sm-0 col-xs-0 "></div>
        <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 ">

            <div class="form1">
                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 user-img">

                        <center>  <img src="meswa.jpg" class="pic" alt="meswa pic" align="middle"> </center>

                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>
                <form class="form-group" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <span class="error"><p class="text-center"><?php echo $error; ?></p></span>
                    <span class="error" style="color:green"> <p class="text-center"> <strong><?php echo $error1; ?> </strong> </p></span>
                    <div class="row">
                        <div class="col-lg-6">
                            <lable>FIRST NAME* </lable>
                            <input type="text" name="firstname" class="form-control" placeholder="Enter your Firstname"value="<?php echo $FirstName;?>">
                            <span class="error" style="color:red"> <?php echo $FirstNameErr;?></span>
                        </div>
                        <div class="col-lg-6">
                            <lable>LAST NAME* </lable>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter your Lastname"value="<?php echo $LastName;?>">
                            <span class="error" style="color:red"> <?php echo $LastNameErr;?></span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <lable>OTHER NAME </lable>
                            <input type="text" name="othername" class="form-control" placeholder="Enter your Othername"value="<?php echo $OtherName;?>">

                        </div>
                        <div class="col-lg-6">
                            <lable>E-MAIL </lable>
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="<?php echo $Email;?>">

                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <lable>PHONE NUMBER* </lable>
                            <input type="text" name="phonenumber" class="form-control" placeholder="Enter your phone number" value="<?php echo $PhoneNo;?>">
                            <span class="error" style="color:red"> <?php echo $PhoneNoErr;?></span>
                        </div>
                        <div class="col-lg-6">
                            <lable>REGISTRATION NUMBER* </lable>
                            <input type="text" name="regno" class="form-control" placeholder="Enter your registration no" value="<?php echo $RegNo;?>">
                            <span class="error" style="color:red"> <?php echo $RegNoErr;?></span>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <lable> ROLE*  </lable>
                            <select class="form-control" name="position" value="<?php echo $Position;?>">
                                <option value="" > ROLE</option>
                                <option value="MEMBER" >MEMBER</option>
                                <option value="CHAIRPERSON" >CHAIRPERSON</option>
                                <option value="VICE CHAIRPERSON" >VICE CHAIRPERSON</option>
                                <option value="TREASURER" >TREASURER</option>
                                <option value="ORGANISING SECRETARY" >ORGANISING SECRETARY</option>
                                <option value="PUBLICITY CHAIRPERSON" >PUBLICITY CHAIRPERSON</option>
                            </select>
                            <span class="error" style="color:red"> <?php echo $PositionErr;?></span>
                        </div>
                        <div class="col-lg-4" >
                            <lable>  YEAR* </lable>
                            <select class="form-control" name="year" value="<?php echo $Year;?>" >
                                <option value="" >YEAR</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                                <option value="4" >4</option>
                                <option value="associate" >ASSOCIATE</option>

                            </select>
                            <span class="error" style="color:red"> <?php echo $YearErr;?></span>
                        </div>
                        <div class="col-lg-4" >
                            <lable>  GENDER* </lable>
                            <select class="form-control" name="gender" value="<?php echo $Gender;?>">
                                <option value="">GENDER</option>
                                <option value="M" >MALE</option>
                                <option value="F" >FEMALE</option>

                            </select>
                            <span class="error" style="color:red"> <?php echo $GenderErr;?></span>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-lg-12">
                            <lable>CONSTITUENCY* </lable>
                            <select class="form-control" name="constituency" value="<?php echo $Constituency;?>">
                                <option value="" >CONSTITUENCY</option>
                                <option value="IMENTI CENTRAL" >IMENTI CENTRAL</option>
                                <option value="SOUTH IMENTI" >SOUTH IMENTI</option>
                                <option value="THARAKA" >THARAKA </option>
                                <option value="MAARA" >MAARA </option>
                                <option value="BUURI" >BUURI</option>
                                <option value="TIGANIA EAST" >TIGANIA EAST</option>
                                <option value="TIGANIA WEST" >TIGANIA WEST</option>
                                <option value="NORTH IMENTI" >NORTH IMENTI</option>
                                <option value="IGEMBE SOUTH" >IGEMBE SOUTH</option>
                                <option value="IGEMBE NORTH" >IGEMBE NORTH</option>
                                <option value="IGEMBE CENTRAL" >IGEMBE CENTRAL</option>
                                <option value="IGAMBA NGOMBE" >CHUKA/IGAMBA-NG'OMBE</option>


                            </select>
                            <span class="error" style="color:red"> <?php echo $ConstituencyErr;?></span>
                        </div>

                    </div>

                    <input type="submit" value="submit" name="submit" class="btn btn-primary btn-block btn-lg" >

                </form>

            </div>

        </div>
        <div class="col-lg-3 col-md-2 col-sm-0 col-xs-0"></div>
    </div>


</div>


</body>
</html>
