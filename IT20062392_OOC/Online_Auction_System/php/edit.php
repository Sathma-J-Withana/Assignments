<?php
include ("config.php");
include ("function.php");

//setting Varialbles
$id ="";
$date = "";
$password = "";
$fname = "";
$lname = "";
$ad1 = "";
$ad2 = "";
$ad3 = "";
$mail = "";
$dob = "";

//setting message Varibles
$msg17 = "";
$msg18 = "";
$msg19 = "";
$msg20 = "";
$msg21 = "";
$msg22 = "";
$msg23 = "";
$msg24 = "";
$msg25 = "";
$msg26 = "";
$msg27 = "";


//checking wheather the login credentials are entered correctly after clicking the submit button

if(isset($_POST['submit']))
{

    $id = $_POST['NIC'];
    $password = $_POST['pass'];

//setting up to display an error message if the NIC is not entered
    if(empty($id))
    {
        $msg17 = "<div style = 'color: red;'>Cannot keep NIC field empty</div>";
    }
//setting up to display an error message if the psw is not entered    
    else if(empty($password))
    {
        $msg19 = "<div style = 'color: red;'>Please enter your password</div>";
    }
//setting up to display an error message if the psw characters typed is less than 5
    else if(strlen($password)<=5)
    {
        $msg21 = "<div style = 'color: red;'>Must Contain at least 5 charaters</div>";
    }
//enabling the profile editting 
    else if(nic_exists($id,$connection)) //Checking the entered NIC are equal to the existing NIC in the database
    {
        $msg25 = "<div style = 'color: green; font-weight:bold;'>Check the table on your right</div>";
        $msg26 = "<div style = 'color: green; font-weight:bold;'>Change your Details here</div>";

        //fetching and retrieving up the details related to the entered NIC from the database

        $resultFNAME = mysqli_query($connection,"SELECT fname FROM customer WHERE NIC ='$id'");
        $retriveFNAME = mysqli_fetch_array($resultFNAME);
        $fname = $retriveFNAME['fname'];

        $resultLNAME = mysqli_query($connection,"SELECT lname FROM customer WHERE NIC ='$id'");
        $retriveLNAME = mysqli_fetch_array($resultLNAME);
        $lname = $retriveLNAME['lname'];


        $resultAD1 = mysqli_query($connection,"SELECT address1 FROM customer WHERE NIC ='$id'");
        $retriveAD1 = mysqli_fetch_array($resultAD1);
        $ad1 = $retriveAD1['address1'];

        $resultAD2 = mysqli_query($connection,"SELECT address2 FROM customer WHERE NIC ='$id'");
        $retriveAD2 = mysqli_fetch_array($resultAD2);
        $ad2 = $retriveAD2['address2'];

        $resultAD3 = mysqli_query($connection,"SELECT address3 FROM customer WHERE NIC ='$id'");
        $retriveAD3 = mysqli_fetch_array($resultAD3);
        $ad3 = $retriveAD3['address3'];

        $resultDOB = mysqli_query($connection,"SELECT dob FROM customer WHERE NIC ='$id'");
        $retriveDOB = mysqli_fetch_array($resultDOB);
        $dob = $retriveDOB['dob'];

        $resultEMAIL = mysqli_query($connection,"SELECT mail FROM customer WHERE NIC ='$id'");
        $retriveEMAIL = mysqli_fetch_array($resultEMAIL);
        $mail = $retriveEMAIL['mail'];

    }
}
?>


<meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Linking the external CSS stylesheet -->
    <link href="../css/home.css" rel="stylesheet">
    
  
</head>

<body style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../Images/img7.jpg) no-repeat center center fixed; background-size: cover;">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!--creating a navigation bar-->
            <div class="navbar-header">
                
                <a class="navbar-brand" href="#"><img id="logo" src="../Images/img1.png"> </a>
                <!--creating a Logo for the navigation bar-->
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
    <div class="container" style="margin-top:100px; margin-left:20px; width :2000px">
        <div class="login-form col-md-4 offset-md-4 ">
            <div class="jumbotron jumbotron-fluid"
                style="margin-top : 200px; padding:25px; border-radius:15px; padding-bottom:10px; background:linear-gradient(rgba(0, 0, 0, 0.3); font-family:Arial, Helvetica, sans-serif;">
                <?php echo $msg25; ?>
                <h2>First, <br>Please Enter Login Credentials for securty purpose.</h2>

<!-- creating the credential entering form required prior to edit in profile-->
                <form method="post">
                    <div class="form-group">
                        <lable> NIC Number : </lable>
                        <input type="text" name="NIC" placeholder="9XXXXXXXV" class="form-control"
                            value="<?php  echo $id; ?>">
                        <?php echo $msg17; ?>
                        <?php echo $msg22; ?>
                    </div>

                    <div class="form-group">
                        <lable> Password : </lable>
                        <input type="password" name="pass" class="form-control" placeholder="Enter new password"
                            value="<?php  echo $password; ?>">
                        <?php echo $msg19; ?>
                        <?php echo $msg21; ?>
                    </div>
                    <center><br><input type="submit" value="Submit" name="submit" class="btn btn-success" /></center>
                    <br>
                   

                </form>
            </div>
        </div>

        <!--creating the editable form-->
        <div class="login-form col-md-6 " style="margin-left:150px;">
            <div class="jumbotron jumbotron-fluid"
                style="margin-top : 20px; padding:15px; padding-bottom:10px; width:800px; border-radius:0px; background:linear-gradient(rgba(0, 0, 0, 1); font-family:Arial, Helvetica, sans-serif;">
                <?php echo $msg26; ?><br>

                <h2>Now You can Change your Details.</h2>
                <?php echo $msg24; ?><br>
                <?php echo $msg27; ?><br>
                <form method="post">
                    <div class="form-group">
                        <lable> NIC Number : </lable>
                        <input type="text" name="NIC" class="form-control" value="<?php  echo $id; ?>">
                    </div>
                    <div class="form-group">
                        <lable> First Name : </lable>
                        <input type="text" name="fname" class="form-control" value="<?php  echo $fname; ?>">
                    </div>
                    <div class="form-group">
                        <lable> Last Name : </lable>
                        <input type="text" name="lname" class="form-control" value="<?php  echo $lname; ?>">
                    </div>
                    
                    <div class="form-group">
                        <lable> Adddress : </lable>
                        <input type="text" name="ad1" class="form-control" value="<?php  echo $ad1; ?>">
                        <br>
                        <input type="text" name="ad2" class="form-control" value="<?php  echo $ad2; ?>">
                        <br>
                        <input type="text" name="ad3" class="form-control" value="<?php  echo $ad3; ?>">
                    </div>

                    <div class="form-group">
                        <lable> E-mail : </lable>
                        <input type="text" name="mail" class="form-control" value="<?php  echo $mail; ?>">
                    </div>

                    <div class="form-group">
                        <lable> Date of birth : </lable>
                        <input type="date" name="dob" class="form-control" value="<?php  echo $dob; ?>">
                    </div>
                   
                   <!--creating a done button-->
                    <center><button type="button" class="btn btn-primary" data-toggle="modal" name ="done" data-target="#exampleModalLong">
                        Done
                    </button></center><br>

                    <!--setting up the path to go to profile if clicked the following button-->
                    <center><a href = "profile.php">I dont want to change anything</a></center>

                    <!-- creating a pop up message -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLongTitle">Everything Is Done</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <?php echo ucfirst($fname). " ".ucfirst($lname). " " ?>your changed data will be saved to our Database<br>Please Log in to proceed..
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" name = "done" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php
                    if(isset($_POST ["done"]))
                    {
            
                    //setting up new Variables incase of a change due to the editing of details
                    $id_0 = $_POST["NIC"];   
                    $fname_0 = $_POST["fname"];
                    $lname_0 = $_POST["lname"];
                    $ad1_0 = $_POST["ad1"];
                    $ad2_0 = $_POST["ad2"];
                    $ad3_0 = $_POST["ad3"];
                    $mail_0 = $_POST["mail"];
                    $date_0 = $_POST["dob"];
                    
                    //setting up to update the changes done while editting the profile    
                    mysqli_query($connection, "UPDATE customer SET fname = '$fname_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET lname = '$lname_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET address1 = '$ad1_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET address2 = '$ad2_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET address3 = '$ad3_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET email = '$mail_0' WHERE NIC = '$id_0'");
                    mysqli_query($connection, "UPDATE customer SET dob = '$date_0' WHERE NIC = '$id_0'");
                    ?>
                    <!--connecting the external java script file-->
                        <script type="text/javascript">
                         window.location = "login.php";
                         </script> 
                         <?php
                    }
                    ?>

                         
                    
                </form>
            </div>
        </div>
    </div>

<!-- creating the footer-->

<img src="../Images/img5.png" alt="payment" class="payment">
<img src="../Images/img6.png" alt="SM" class="SM">


</body>

