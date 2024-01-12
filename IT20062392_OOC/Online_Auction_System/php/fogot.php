<?php
include ("config.php");
include ("function.php");

$msg17 = "";
$msg18 = "";
$msg19 = "";
$msg20 = "";
$msg21 = "";
$msg22 = "";
$msg23 = "";
$msg24 = "";

$id ="";
$date = "";
$password = "";

if(isset($_POST['submit']))
{

    $id = $_POST['NIC'];
    $date = $_POST['dob'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    if(empty($id))
    {
        $msg17 = "<div style = 'color: red;'>Cannot keep NIC field empty</div>";
    }

    else if(empty($date))
    {
        $msg18 = "<div style = 'color: red;'>Cannot keep Date of birth field empty</div>";
    }

    else if(empty($password))
    {
        $msg19 = "<div style = 'color: red;'>What do you want us to change?</div>";
    }

    else if(strlen($password)<=5)
    {
        $msg21 = "<div style = 'color: red;'>Must Contain at least 5 charaters</div>";
    }

    else if($password !== $cpassword)
    {
        $msg20 = "<div style = 'color: red;'>Password dosent match.</div>";
    }

    else if(nic_exists($id,$connection))
    {
        $result = mysqli_query($connection,"SELECT dob FROM customer WHERE NIC ='$id'");
        $retrive = mysqli_fetch_array($result);
        $dob = $retrive['dob'];
        if($date == $dob)
        {
            $hashed = hash("sha512",$password);
            mysqli_query($connection, "UPDATE customer SET password = '$hashed' WHERE NIC = '$id'");
            $msg24 = "<div style = 'color: green; font-weight:bold;'>Passoword Changed Successfully</div>";
        }

        else
        {
            $msg23 = "<div style = 'color: red;'>Invalid Date Of Birth</div>";
        }
    }

    else{
        $msg22 = "<div style = 'color: red;'>NIC not Found</div>";
    }
}



?>

<title>Forgot Password </title>

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    

    <link href="pharmacy_home.css" rel="stylesheet">
    <link rel="icon" href="./Images/img1.png">

</head>

<body
 style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(./Images/img7.jpg) no-repeat center center fixed; background-size: cover;">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!--Best for responsive pages-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-main">
                    <!--Icon on nav bar-->
                    <span class="sr-only">Toggle Navigation</span>
                    <!--focusing on screen readers-->
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <!--3 lines on icon -->
                    <span class="icon-bar"></span>

                </button>
                <a class="navbar-brand" href="#"><img id="logo" src="./Images/img1.png"> </a>
                <!--Logo for nav bar-->
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <ul class="nav navbar-nav navbar-right">
                <li><a  href="Auction_home.php">Home</a> </li>
                    <li><a href="#">Category</a> </li>
                    <li><a href="#">Bidding</a> </li>
                    <li><a href="#">About</a> </li>
                    <li><a href="#">Contact</a> </li>
                    <li><a href="login.php">Login</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:100px; margin-left:20px;">
        <div class="login-form col-md-4 offset-md-4 ">
            <div class="jumbotron"
                style="margin-top : 20px; padding:15px; padding-bottom:10px; background:linear-gradient(rgba(0, 0, 0, 0.1); font-family:Arial, Helvetica, sans-serif;">
                <h2>Forgot Password</h2>
                <?php echo $msg24; ?><br>
                <form method="post">
                    <div class="form-group"> 
                        <lable> NIC Number : </lable>
                            <input type="text" name="NIC" placeholder="9XXXXXXXV" class="form-control" value = "<?php  echo $id; ?>">
                            <?php echo $msg17; ?>
                            <?php echo $msg22; ?>
                    </div>
                    <div class="form-group">
                        <lable> Date of Birth : </lable>
                        <input type="date" name="dob" class="form-control" value = "<?php  echo $date; ?>">
                        <?php echo $msg18; ?>
                        <?php echo $msg23; ?>
                    </div>
                    <div class="form-group">
                        <lable> New Password : </lable>
                        <input type="password" name="pass" class="form-control" placeholder="Enter new password" value = "<?php  echo $password; ?>" >
                        <?php echo $msg19; ?>
                        <?php echo $msg21; ?>
                    </div>
                    <div class="form-group">
                        <lable> Re-Enter Password : </lable>
                        <input type="password" name="cpass" class="form-control" placeholder="Re-Enter New Password">
                        <?php echo $msg20; ?>
                        
                    </div>
                    <center><br><input type="submit" value="Submit" name="submit" class="btn btn-success" /></center><br>
                    <center><a href  = "login.php">Go Back to Login Page</a></center>
                    
                </form>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
    <img src="Images/img5.png" alt="payment" class="payment">
<img src="Images/img6.png" alt="SM" class="SM">
    </footer>

</body>