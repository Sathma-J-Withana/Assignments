<html>
<head>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   
<!-- Linking the external CSS stylesheet -->
    <link href="../css/home.css" rel="stylesheet">
   
    <?php
    include ("config.php");
    include ("function.php");

//setting Varialbles

    $nic  = "";
    $fname = "";
    $lname = "";
    $ad1 = "";
    $ad2 = "";
    $ad3 = "";
    $email = "";
    $date = "";
    $password = "";
    $cpassword = "";
   
//setting message Varibles
    $msg1 = "";
    $msg2 = "";
    $msg3 = "";
    $msg4 = "";
    $msg5 = "";
    $msg6 = "";
    $msg7 = "";
    $msg8 = "";
    $msg9 = "";
    $msg10= "";
    $msg11= "";
    $msg12= "";
    $msg13= "";
    $msg14= "";


//checking wheather the submit form details are entered correctly after clicking the submit button

    if(isset($_POST ["submit"]))
    {
        $nic = $_POST["NIC"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $ad1 = $_POST["address1"];
        $ad2 = $_POST["address2"];
        $ad3 = $_POST["address3"];
        $email = $_POST["mail"];
        $date = $_POST["dob"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        
        $checkbox = isset($_POST["check"]);
        
        
        //Validations for Buyer Registration

        if(strlen($nic) < 10)
        {
            $msg3 = "<div style = 'color: red;'>Please Enter a Correct NIC number</div>";
        }

        else if(nic_exists($nic,$connection))
        {
            $msg11 = "<div style = 'color: red;'>This User is already exsist </div>";
        }

        else if(strlen($fname)<=4) 
        {
            $msg1 = "<div style = 'color: red;'>First Name Must Contain at least 3 Characters</div>";
        }

        else if(strlen($lname)< 3)
        {
            $msg2 = "<div style = 'color: red;'>Last Name Must Contain at least 3 Characters</div>";
        }

        else if (empty($date))
        {
            $msg6 = "<div style = 'color: red;'>Enter your Date of birth</div>";
        }
        

        else if (empty($password))
        {
            $msg12 = "<div style = 'color: red;'>Enter a password please. It cannot be empty</div>";
        }
        else if(strlen($password)<=6)
        {
        $msg14 = "<div style = 'color: red;'>Must Contain at least 5 charaters</div>";
        }

        else if (empty($cpassword))
        {
            $msg13 = "<div style = 'color: red;'>Please confirm your password</div>";
        }

        else if($password !== $cpassword)
        {
            $msg8 = "<div style = 'color: red;'>Password dosent match.</div>";
        }

        

        else if ($checkbox == "")
        {
        $msg9 = "<div style = 'color: red;'>Please Agree on Terms and Conditions.</div>";
        }

        else
        {
            
            
            $hashed = hash("sha512",$password);   //password encrypting

            //inserting data to the database
            $sql = "INSERT INTO customer (NIC,fname,lname,address1,address2,address3,mail,dob,password)
            VALUES ('$nic','$fname','$lname','$ad1','$ad2','$ad3','$email','$date','$hashed')";
            if ($conn->query($sql) === TRUE) {
                $msg10 = "<div style = 'color:green; align:center;'> You are SucessFully Registerd</div>";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            

            $nic  = "";
            $fname = "";
            $lname = "";
            $ad1 = "";
            $ad2 = "";
            $ad3 = "";
            $email = "";
            $date = "";
            $password = "";
            $cpassword = "";
            $img = "";

            
        }
    }
    ?>
    
</head>

<body style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../Images/img7.jpg) no-repeat center center fixed; background-size: cover;">

       <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
       

                </button>
                <a class="navbar-brand" href="#"><img id="logo" src="../Images/img1.png"> </a>
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
    <div class="container" style="margin-left:100px;margin-top:100px">
        <div class="login-form col-md-7 offset-md-4 ">
            <div class="jumbotron"
                style="margin-top : 24px; padding:15px; padding-bottom:20px;  font-family:Arial, Helvetica, sans-serif;">
                <?php echo $msg10; ?>
                <h2>Register and </h2>
                <h2>Lets Start to  Shopping. </h2>

<!-- creating the Registering  entering form required prior to edit in profile-->

                
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <lable> NIC Number : </lable>
                            <input type="text" name="NIC"  class="form-control" value = "<?php  echo $nic; ?>">
                            <?php echo $msg3; ?>
                            <?php echo $msg11; ?>
                    </div>
                    <div class="form-group">
                        <lable> First Name : </lable>
                        <input type="text" name="fname"  class="form-control" value = "<?php  echo $fname; ?>">
                        <?php echo $msg1; ?>
                    </div>

                    <div class="form-group">
                        <lable> Last Name: </lable>
                        <input type="text" name="lname"  class="form-control" value = "<?php  echo $lname; ?>">
                        <?php echo $msg2; ?>
                    </div>
                    <div class="form-group">
                        <lable> Address : </lable>
                        <input type="text" name="address1" class="form-control" value = "<?php  echo $ad1; ?>">
                        <input type="text" name="address2"  class="form-control" value = "<?php  echo $ad2; ?>">
                        <input type="text" name="address3"  class="form-control" value = "<?php  echo $ad3; ?>">
                    </div>
                    <div class="form-group">
                        <lable> E-mail : </lable>
                        <input type="mail" name="mail" class="form-control" value = "<?php  echo $email; ?>">
                        <?php echo $msg5; ?>
                    </div>
                    <div class="form-group">
                        <lable> Date of birth: </lable>
                        <input type="date" name="dob"  class="form-control" value = "<?php  echo $date; ?>">
                        <?php echo $msg6; ?>
                    </div>
                    <div class="form-group">
                        <lable> Password : </lable>
                        <input type="password" name="password"
                            placeholder="Must contain(more than 8 digits,number,letter)" class="form-control" >
                            <?php echo $msg12; ?>
                            
                    </div>
                    <div class="form-group">
                        <lable> Re-Enter Password : </lable>
                        <input type="password" name="cpassword"
                            placeholder="Must contain(more than 8 digits,number,letter)" class="form-control">
                            <?php echo $msg13; ?>
                    </div>
                    <input type="checkbox" name="check" />
                    I Agree on the <a href="#">Terms and Conditions<br></a>
                    <?php echo $msg9; ?>

                       <!--creating a Submit button-->
                    <center><br><input type="submit" value="Register" name="submit" class="btn btn-success" /></center><br>
                    <center><a href = "login.php">If You have a Account </a></center>
                </form>
            </div>
        </div>
    </div>
    <!-- <footer class="container-fluid text-center"> -->
    <img src="../Images/img5.png" alt="payment" class="payment">
<img src="../Images/img6.png" alt="SM" class="SM">
    <!-- </footer> -->
</body>
</html>

