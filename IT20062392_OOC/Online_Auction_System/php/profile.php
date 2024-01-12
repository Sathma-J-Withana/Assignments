
<?php 
include ("config.php");
include ("function.php");
session_start();



if(isset($_COOKIE['name'])) //Using Cookies ()
{

    //refering the database with the Login details and setting up to view the name of the user

$id = $_COOKIE['name'];

$result =mysqli_query($connection, "SELECT  fname, lname, NIC from customer WHERE NIC = '$id'");
$retrive =mysqli_fetch_array($result);


$firstname = $retrive['fname'];
$lastname =  $retrive['lname'];
$nic = $retrive['NIC'];

?>


<title>Profile Page</title>

<title>The Online Auction System</title>

<!-- Linking the external CSS stylesheet -->
<link rel="stylesheet"type="text/css" href="../css/styles.css">
		<title>Online Auction System</title>
</head>


<div class="backgroundimg">
		<body style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../Images/img7.jpg) no-repeat center center fixed; background-size: cover;">

			<img src="../Images\img1.png" alt="logo" class="logo">
			 <h3>The online Auction System</h3><br>

			 <hr class="new4">
			 
		 <div class="topnav">
			 <a href="Auction_home.php">Home</a>
			 <a href="#Categories">Categories</a>
			 <a href="#bidding">Bidding</a>
			 <a href="#about">About</a>
			 <a href="#contact">Contact</a>
		 
				<div class="corner">
			 			<a class="active" href="Login.php">Login</a>
						 <a href="#Sign up">Sign up</a>
				</div>

		</div>
	 
	 <br>

     <!-- Create a Buyers Profile  -->

	 <div class="container-fluid" style="margin-top:20px;">
        <div class="col-md-2"
        style="margin-top:70px; background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)); border-radius:5px; padding-top:8px; padding-bottom:8px; margin-bottom:20px; margin-left:250px; float:left; width:1200px; height:1000px;">
            <h3 align="left" style="color:white; font-family:verdana;">Welcome,<br> <?php echo ucfirst($firstname). " ".ucfirst($lastname) ?>
            </h3>
            <h4 align="left" style="color:white; font-family:verdana;"><?php echo ucfirst($nic)?></h4>
            <a href="logout.php"><button class="btn btn-primary btn-sm"  style = "font-family:verdana;">Log Out</button></a>
            <a href = "edit.php"><button class="btn btn-primary btn-sm"  style="float:right; font-family:verdana; margin-top:0px;">Edit Profile</button></a>

            <br>
            <br>
            <hr>

            <h2 align="left" style="color:white; font-family:verdana;">Lets Check Our New Arrivals,<br>
            </h2><br>
            <a href = "" ><h4 align="left" style="color:white; font-family:verdana;">Check out our store</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">New Categories</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">Check out your cart</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">New Deals</h4></a><br>
        </div>
    </div>
    

        
</body>
</div>
</html>
<?php
}
else{
    $id = $_SESSION['id']; //Using Session


$result =mysqli_query($connection, "SELECT  fname, lname, NIC from customer WHERE NIC = '$id'");
$retrive =mysqli_fetch_array($result);



$firstname = $retrive['fname'];
$lastname =  $retrive['lname'];
$nic = $retrive['NIC'];
?>


<title>Profile Page</title>
</head>

<!-- Linking the external CSS stylesheet -->
<link rel="stylesheet"type="text/css" href="../css/styles.css">
		<title>Online Auction System</title>



</head>

<div class="backgroundimg">
		<body style="background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(../Images/img7.jpg) no-repeat center center fixed; background-size: cover;">

			<img src="../Images\img1.png" alt="logo" class="logo">
			 <h3>The online Auction System</h3><br>
		 
			 <hr class="new4">
			 
	 
	 <!-- Navigation Bar  -->

		 <div class="topnav">
			 <a href="Auction_home.php">Home</a>
			 <a href="#Categories">Categories</a>
			 <a href="#bidding">Bidding</a>
			 <a href="#about">About</a>
			 <a href="#contact">Contact</a>
		 
				<div class="corner">
			 			<a class="active" href="Login.php">Login</a>
						 <a href="#Sign up">Sign up</a>
				</div>

		</div>
	 
	 <br>

     <!-- Creating Buyers Profile  -->

	 <div class="container-fluid" style="margin-top:20px;">
        <div class="col-md-2"
            style="margin-top:70px; background:linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)); border-radius:5px; padding-top:8px; padding-bottom:8px; margin-bottom:20px; margin-left:250px; float:left; width:1200px; height:1000px;">
           
            <h3 align="left" style="color:white; font-family:verdana;">Welcome,<br> <?php echo ucfirst($firstname). " ".ucfirst($lastname) ?>
            </h3>
            <h4 align="left" style="color:white; font-family:verdana;"><?php echo ucfirst($nic)?></h4>
            <a href="logout.php"><button class="btn btn-primary btn-sm"  style = "font-family:verdana;">Log Out</button></a>
            <a href = "edit.php"><button class="btn btn-primary btn-sm"  style="float:right; font-family:verdana; margin-top:0px;">Edit Profile</button></a>

            <br>
            <br>
            <hr>

            <h2 align="left" style="color:white; font-family:verdana;">Lets Check Our New Arrivals,<br>
            </h2><br>
            <a href = "" ><h4 align="left" style="color:white; font-family:verdana;">Check out our store</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">New Categories</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">Check out your cart</h4></a><br>
            <a href = ""><h4 align="left" style="color:white; font-family:verdana;">New Deals</h4></a><br>
        </div>
    </div>
       
<?php
}

?>
</body>

</div>


</html>