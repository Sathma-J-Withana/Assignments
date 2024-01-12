<?php
include("header.php");
include("config.php");
include("function.php");
session_start();

//setting up message attributes
$msg12 = "";
$msg13 = "";
$msg14 = "";
$msg15 = "";
$msg16 = "";

//setting up attributes
$id = "";
$pass = "";
$checkbox = "";

if (isset($_POST["submit"])) {

	$id = $_POST["id"];
	$pass = $_POST["password"];
	$checkbox = isset($_POST["check"]);

	if (empty($id)) {
		$msg12 = "<div style = 'color: red;'>Please Enter your NIC number </div>";
	} else if (empty($pass)) {
		$msg13 = "<div style = 'color: red;'>Please Enter your Password </div>";
	} else if (nic_exists($id, $connection)) {
		$Epass = mysqli_query($connection, "SELECT password  From customer where NIC = '$id'");
		$Epass_a =  mysqli_fetch_array($Epass);
		$Dpass = $Epass_a["password"];
		$Hpass = hash("sha512", $pass);

		if ($Dpass !== $Hpass) {
			$msg15 = "<div style = 'color: red;'>The Password is Not Matching</div>";
		} else if ($Dpass == $Hpass) {
			$_SESSION['id'] = $id;
			if ($checkbox == "on") {
				setcookie('name', $id, time() + 1000000);
			}
			header("location:profile.php");
		}
	} else {
		$msg16 = "<div style = 'color: red;'>Invalid NIC Number</div>";
	}
}
?>
<!-- Linking the external CSS stylesheet -->
<link href="../css/home.css" rel="stylesheet">
  

<body class="backgroundimg">

	<img src="../Images\img1.png" alt="logo" class="logo">
	<h2 class="sansserif">Quick Auctions</h2>
	<h3>The online Auction System</h3><br>

	<hr class="new4">


<!-- creating the navigation bar-->
	<div class="topnav">
		<a href="Auction_home.php">Home</a>
		<a href="#Categories">Categories</a>
		<a href="#bidding">Bidding</a>
		<a href="#about">About</a>
		<a href="#contact">Contact</a>

		<div class="corner">
			<a class="active" href="Login.html">Login</a>
			<a href="sign_up.php">Register</a>
		</div>

	</div>

	<br>
	<br>

	<div class="container" >
		<div style="margin: auto;width: 50%;text-align: center;">
			<p style="color: aliceblue; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: large; font-style: oblique; text-align:center">Choose your A/C type</p>
			<div class="btn-group">

			
				<form method="get" action="sign_up.php">
    			<button type="submit">Buyers A/C</button>
				</form>
				<form method="get" action="sign_up.php">
    			<button type="submit">Sellers A/C</button>
				</form>

			</div>
		</div>
				
		<div style="margin: auto;width: 50%;padding-top:200px">
			<form style="font-family:verdana;" method="post">
				<input type="text" id="uname" placeholder="Username" name="id" value="<?php echo $id; ?>" required />
				<?php echo $msg12; ?>
				<?php echo $msg14; ?>
				<?php echo $msg16; ?>
				<input type="password" id="psw" placeholder="Password" name="password" required>
				<script src="../JS/JS.js"></script>

				<div class="check">
					<label>
						<input type="checkbox" checked="checked" name="remember"> Remember me
					</label>
				</div>
				<div class="sign">
					<button type="submit" name="submit">Sign in</button>
				
				</div>


<!-- creating the cancel and the forget password buttons -->
				<div>
					<button type="button" class="cancelbtn">Cancel</button>
					<span class="psw">Forgot <a href="fogot.php"> password?</a></span>
				</div>
			</form>




		</div>
	</div>




<!-- creating a register button-->
	<p style="color: aliceblue; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:large; font-style: oblique; margin-left: 15%;position: relative;top: -100px;">Don't have an A/C</p>
	<div class="register">
		<button>Register Here !</button>

	</div>


	</div>

	<hr class="new4">
<!--setting up a footer-->
	<img src="../Images/img5.png" alt="payment" class="payment">
	<img src="../Images/img6.png" alt="SM" class="SM">





</body>