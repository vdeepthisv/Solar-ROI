<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	
	<title>Solar ROI|Vijaya Deepthi Srivoleti</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<!-- Bootstrap -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<!-- Icon font -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
	<!-- Custom styles -->
	<link rel="stylesheet" href="assets/css/styles.css">

	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>
<body>

<header id="header">
	<div id="head" class="parallax" parallax-speed="1">
		<h1 id="logo" class="text-center">
			<span class="title">Solar ROI</span>
			
		</h1>
	</div>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			</div>
			
			<div class="navbar-collapse collapse">
				
				<ul class="nav navbar-nav">
					<li><a href="index.html">Home</a></li>
					<li class="active"><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
							<li><a href="single.html">Blog Post</a></li>
						</ul>
					</li>
					<li><a href="blog.html">Blog</a></li>
				</ul>
			
			</div><!--/.nav-collapse -->			
		</div>	
	</nav>
</header>

<main id="main">

	<div class="container">

		<div class="row topspace">
			
			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">Activate user:</h1>
				</header>

				<form id="signin" action="" method="post">
<p> Please fill in the below details:
<br/>
<br/>

<!--input and output elements-->
<table cellpadding="10">


<tr>
	<td> Email ID:</td><td><input name="emailid" id="emailid" type="text" required></td>
</tr>


<tr>
	<td> Password:</td><td><input type="password" name="password1" id="password1" required></td>
</tr>


<tr>
	<td> Code:</td><td><input name="code" id="code" type="text" required></td>
</tr>


<tr>
	<td> <input type="submit" name="submit" value="submit" ></td>
	<td><input type="reset" name="reset" value="Reset"></td>
</tr>
</table>
 
</form>
<?php
include ('assets/database/databaseconnection.php');


if (isset($_POST['submit'])) 
{
	//echo "submit";
	$emailid = $_POST['emailid'];
	$password1 = $_POST['password1'];
	$code = $_POST['code'];

 $query = "SELECT * FROM Userdetails WHERE emailid = '".$emailid."' AND password1 = '".$password1."'and code=".$code.";" ;
$result=mysql_query($query);
$count=mysql_num_rows($result);

	if ($count> 0) {
			echo "Successful activation.";

	//$code = $_POST['code'];
	$sqlupdate = "update Userdetails set activationyesno=1 where emailid = '".$emailid."' AND password1 = '".$password1."'and code=".$code.";" ;
	$res = mysql_query($sqlupdate);

			} else
	 {
	echo "Login failed.Please check the enteries again.Or else please click the sign-up tab above.";
	}

}     
	
?>


				
				
			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-left">

			<div class="widget">
			<iframe width="300" height="300"src="http://www.youtube.com/embed/PJNIIT3qosc"></iframe><br>
			<span class="title">Save on Your Electric Bill</span>
			</div>
				

				<div class="widget">
					<h4>Offset your electricity costs</h4>
				<p>When your solar power system generates more electricity than your home can immediately use, your excess power flows back to the utility grid and your meter literally spins backward! Most utility companies will pay or credit you for this electricity.

			<p>Your solar power system produces the most electricity during the middle of the day, during "peak" hours when the utility rates are at their highest. This is to your advantage, because you can sell excess electricity at high peak rates in the afternoon, and buy electricity back at lower "off-peak" rates at night. You buy low and sell high! This is referred to as "net metering" and can lower your electricity bill even further.</p>
			
			</div>
				
				
			</aside>			
			<!-- /Sidebar -->
			
		</div>
	</div>	<!-- /container -->
	
</main>

<footer id="footer" class="topspace">
	<div class="container">
		<div class="row">
			<div class="col-md-3 widget">
				<h3 class="widget-title">Contact</h3>
				<div class="widget-body">
					<p>+774 462 9201<br>
						<a href="mailto:#">VijayaDeepthi_Srivoleti@student.uml.edu</a><br>
						<br>
						Umass Lowell, 1 University Ave,Lowell-01851
					</p>	
				</div>
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Follow me</h3>
				<div class="widget-body">
					<p class="follow-me-icons">
						<a href=""><i class="fa fa-twitter fa-2"></i></a>
						<a href=""><i class="fa fa-dribbble fa-2"></i></a>
						<a href=""><i class="fa fa-github fa-2"></i></a>
						<a href=""><i class="fa fa-facebook fa-2"></i></a>
					</p>
				</div>
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Purpose</h3>
				<div class="widget-body">
<p> This website is mainly to display all html5 features and use various technologies like php ,javascript.</p>
					</div>
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Form widget</h3>
				<div class="widget-body">
					<p>+774 462 9201<br>
						<a href="mailto:#">VijayaDeepthi_Srivoleti@student.uml.edu</a><br>
						<br>
						Umass Lowell 1 University Avenue Lowell-01851 
					</p>	
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</footer>

<footer id="underfooter">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 widget">
				<div class="widget-body">
					<p>Umass Lowell 1 University Avenue Lowell-01851 </p>
				</div>
			</div>

			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2015, Vijaya Deepthi Srivoleti<br> 
						
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</footer>



<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="assets/js/template.js"></script>
</body>
</html>
