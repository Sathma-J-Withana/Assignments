<!DOCTYPE html>
<html>

<head>
		<!-- Linking the external CSS stylesheet -->
		<link rel="stylesheet"type="text/css" href="../css/styles.css">

		<title>Online Auction System</title>

		
<style>

</style>
		
	</head>

<body>
<div class="backgroundimg">
		<body>

			
			<!-- Setting up the logo including the header-->
			<img src="../Images\img1.png" alt="logo" class="logo">
			 <h2 class="sansserif">Quick Auctions</h2>
			 <h3>The online Auction System</h3><br>
		 
			 <hr class="new4">
			 
	 
			<!-- Creating the top navigation bar -->
		 <div class="topnav">
			 <a class="active" href="Auction_home.php">Home</a>
			 <a href="#Categories">Categories</a>
			 <a href="#bidding">Bidding</a>
			 <a href="#about">About</a>
			 <a href="#contact">Contact</a>
		 
				<div class="corner">
			 			<a href="login.php">Login</a>
						 <a href="sign_up.php">Sign up</a>
				</div>

		</div>
	 
	 <br>
	 
		<!-- Creating the Image slider-->
	 <div class="slideshow-container">

		<!-- Image number 1 of the slider image-->
		<div class="mySlides fade">
		  <div class="numbertext">1 / 3</div>
		  <img src="../Images/img4.jpg" style="width:100%">
		  <div class="text"><caption> </caption> </div>
		</div>
		
		<!-- Image number 2 of the slider image-->
		<div class="mySlides fade">
		  <div class="numbertext">2 / 3</div>
		  <img src="../Images/img3.png" style="width:100%">
		  <div class="text"><caption> Hire your advisors to gain benifts while Bidding</caption></div>
		</div>

		<!-- Image number 3 of the slider image-->
		<div class="mySlides fade">
		  <div class="numbertext">3 / 3</div>
		  <img src="../Images/img2.jpg" style="width:100%">
		  <div class="text"><caption></caption>Start to bid today it self to enjoy exclusive offers!</caption></div>
		</div>
		
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>
		
		</div>
		<br>
		
		<!-- Setting up the dots requuired to show the current slide -->
		<div style="text-align:center">
		  <span class="dot" onclick="currentSlide(1)"></span> 
		  <span class="dot" onclick="currentSlide(2)"></span> 
		  <span class="dot" onclick="currentSlide(3)"></span> 
		</div>

		<!-- Linking up the external Java Script file -->
		<script src="../JS/JS.js"></script>

  <hr class="new5"> <br>


  <!-- Creating a selective banner -->
  <div class="banner">
	  <a href="#Daily Deals">Daily Deals!</a>
	  <br><br>
	  <a href="#New Arrivals">New Arrivals!</a>
	  <br><br>
	  <a href="#Most Viewed">Most Viewed!</a>

</div>

<!-- Creating the side content -->
<div class="content">
	Place your Bids TODAY &<br>
	Get the items before it's Gone !
		
</div>
<br><br>


<!-- Creating the off-Canvas menue -->
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Local Auctions</a>
  <br><br>
  <a href="#">Foreign Auctions</a>
 </div>

 <div id="main">
	<span style="color: rgb(255, 255, 255); font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  </div>


<hr class="new4">

<!--setting up The footer -->
<img src="../Images/img5.png" alt="payment" class="payment">
<img src="../Images/img6.png" alt="SM" class="SM">


	 
	 
	 
		 </body>

	</div>
	

</html>