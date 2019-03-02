<?php
/**
 * Created by PhpStorm.
 * User: CollyneJumah
 * Date: 07/21/2018
 * Time: 09:38
 */
?>


<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>meswa login</title>
    <link rel="icon" type="image/ico" href="meswa.jpg" />
    <style>
        .form1{
            margin-left:15px;
            margin-right:15px;
        }
        label{
            color:white;
        }
        #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }
        #message small {
            padding: 10px 35px;
            font-size: 12px;
        }
        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <link rel="stylesheet"  href="js/bootstrap.js"/>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />

</head>

<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>





<?php
$username1 = $error = "";
$password1 = "3";


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
//echo "<br>";

//-----------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $username1="";
    } else {
        $username1= $_POST["username"];
    }

    if (empty($_POST["password"])) {
        $password1="";
    } else {
        $password1= $_POST["password"];
    }



    $result = false;
    $sql = "SELECT * FROM lists WHERE  PHONENO = '$password1' AND REGNO = '$username1' ";
    $result= mysqli_query($conn, $sql);
    //echo $sql;

    if (mysqli_query($conn ,$sql)){
        //echo "<br>";
        //echo "records extracted";
    } else {
        //echo "<br>";
        //echo "error records not extracted";
    }



    $rowcount = mysqli_num_rows($result);
    // echo $rowcount;

    if (mysqli_num_rows ($result) == 1) {
        //	header("Location: signup.php");
        echo '<script type="text/javascript">
                            
                             window.location = "http://www.martinmuthomi.co.ke/signup.php";
                       
                        
                           </script>';

    }
    else
    {
        //header("Location: LoginFormTest.php");
        $error = "WRONG USERNAME OR PASSWORD";
    }


}








mysqli_close($conn);

?>






<div class="container">

    <div class="row">
        <div class="col-md-0 col-lg-3"></div>
        <div class="col-md-12 col-lg-6">
            <div class="panel-heading">
                <h3 class="text-center">

                </h3>
            </div></div>
        <div class="col-md-0 col-lg-3"></div>
    </div>

    <div class="row">
        <div class="col-md-0 col-lg-3"></div>
        <div class="col-md-12 col-lg-6 form1">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="row">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 user-img">

                        <center>  <img src="meswa.jpg" class="pic" alt="meswa pic" align="middle"> </center>

                    </div>
                    <div class="col-sm-4">

                    </div>
                </div>
                <span class="error" style="text-align:center"> <p class="text-center" ><?php echo $error; ?> </p></span>
                <div class="form-group">
                    <label>USERNAME:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" value="<?php echo $username1; ?>" >
                </div>
                <div class="form-group">
                    <label>PASSWORD:</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number,one uppercase and lowercase letter, and at least 8 or more characters">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" onclick="showPassword()" >Show Password
                    </label>
                </div>
                <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" >
            </form>
            <div id="message">
                <h5>Password must contain the following:</h5>
                <small id="letter" class="invalid">A <b>lowercase</b> letter</small><br>
                <small id="capital" class="invalid">A <b>capital (uppercase)</b> letter</small><br>
                <small id="number" class="invalid">A <b>number</b></small><br>
                <small id="length" class="invalid">Minimum <b>8 characters</b></small>
            </div>
        </div>
        <div class="col-md-0 col-lg-3"></div>

    </div>
</div>
<script rel="script">
    var input=document.getElementById('password');
    var letter=document.getElementById('letter');
    var capital=document.getElementById('capital');
    var number=document.getElementById('number');
    var length=document.getElementById('length');

    //when user clicks on the password field show the message box
    input.onfocus=function () {
        document.getElementById("message").style.display="block";
    }
    //when user clicks outside the field, hide the message box
    input.onblur=function () {
        document.getElementById("message").style.display="none";
    }

    //when user starts typing something inside the password fields
    input.onkeyup = function () {
        //1. validate lowercase letters
        var lowerCase = /[a-z]/g;
        if (input.value.match(lowerCase)) {
            letter.classList.remove("invalid");
            letter.classList.add("valid");
        } else {
            letter.classList.remove("valid");
            letter.classList.add("invalid");
        }
        //2.validate capital letters

        var upperCase = /[A-Z]/g;
        if (input.value.match(upperCase)) {
            capital.classList.remove("invalid");
            capital.classList.add("valid");
        } else {
            capital.classList.remove("valid");
            capital.classList.add("invalid");
        }
        //3.validate number
        var numbers = /[0-9]/g;
        if (input.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        //4. validate length
        if (input.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
    function showPassword() {
        var show=document.getElementById("password");
        if(show.type==="password"){
            show.type="text";
        }else {
            show.type="password";
        }

    }
</script>
</body>
</html>
