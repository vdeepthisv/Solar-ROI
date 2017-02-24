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
					<!--<li class="active"><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
							<li><a href="single.html">Blog Post</a></li>
						</ul>
					</li>
					<li><a href="blog.html">Blog</a></li>-->
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
					<h1 class="page-title">Register User:</h1>
				</header>

				<form id="signin" action="" method="post">
<p> Please fill in the below details:
<br/>
<br/>

<table cellpadding="10">

<tr>
	<td> Name:</td><td><input name="name" id="name" type="text" required></td>
</tr>

<tr>
	<td> Email ID:</td><td><input name="emailid" id="emailid" type="email" required></td>
</tr>

<tr>
	<td> Phone:</td><td><input name="phone" id="phone" type="number"></td>
</tr>
<tr>
	<td> Password:</td><td><input name="password1" id="password1" type="password" required></td>
</tr>
<tr>
	<td> Confirm password:</td><td><input name="password2" id="password2" type="password" required></td>
</tr>

<tr>
	<td> <input type="submit" name="submit" value="submit"></td>
	<td><input type="reset" name="reset" value="Reset"></td>
</tr>
</table>

</form>
<?php
//echo "in Php file";
if(isset($_POST['submit']))
{


//if (empty($name)) echo 'Please fill in your name';

//if (empty($emailid)) echo 'Please enter email-id';


//if (empty($password1)) echo 'Please enter your password';

//if (empty($password2)) echo 'Please enter your password to confirm';

if ($_POST["password1"] == $_POST["password2"]) {
  echo "Passwords match. </br/>";
//echo "Submit ";
$con = mysql_connect("localhost","vsrivole","vs2738");
if($con)
//echo "Connected to server";
//else
//echo "not connected to server";

$select_db = mysql_select_db("vsrivole");

 if($select_db)
 //echo "selected";
//else 
//echo "not selected"; 

	
	$name = $_POST['name'];
	$emailid = $_POST['emailid'];
	$phone = $_POST['phone'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];
	$code = rand(300000,7000000);
	$sql = "insert into Userdetails (name,emailid,phone,password1,password2,activationyesno,code)  values('$name','$emailid','$phone','$password1','$password2','0','$code')";
	$res = mysql_query($sql);
		if($res)
{
		//echo "Inserted successfully";
	//else
		//echo "Not inserted".mysql_error();

//echo "We have sent you an activation code to your email.Please click here to enter the activation code :";
//echo "<form name=\"activate\" action=\"activate.php \" method=\"get\">";
//echo "<input type=\"submit\" value=\"Click here to activate\">";
//echo "</form>";

	
	//<input name="activate" id="activate" type="text">
	//<html> input type=button onClick="location.href='./activate.php'" value='Activate'>  </html>

	               $to  = $emailid;
$subject = 'SOI-Account activation code';
$message = "Hello  ".$name.".Your activation code is ".$code."";

$headers = 'From: vdeepthi.sv@gmail.com' . "\r\n" .
    'Reply-To: vdeepthi.sv@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if(mail($to, $subject, $message, $headers))
	{
        echo "We have sent you an activation code to your email.Please click here to enter the activation code :";
echo "<form name=\"activate\" action=\"activate.php\" method=\"get\">";
echo "<input type=\"submit\" value=\"Click here to activate\">";
echo "</form>";
	
    }
else
	echo "Email not sent.Please verify your email address.";

}
else
	echo "not inserted";






}
else {
   echo "Passwords do not match.Please re-enter the passwords";
echo "<form name=\"Sign up\" action=\"Signup.php \" method=\"get\">";
echo "<input type=\"submit\" value=\"Click here  to re-enter the details\">";
echo "</form>";

}




}
//OS used
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );
 foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function getBrowser() {

    global $user_agent;

    $browser        =   "Unknown Browser";

    $browser_array  =   array(
                            '/msie/i'       =>  'Internet Explorer',
                            '/firefox/i'    =>  'Firefox',
                            '/safari/i'     =>  'Safari',
                            '/chrome/i'     =>  'Chrome',
                            '/opera/i'      =>  'Opera',
                            '/netscape/i'   =>  'Netscape',
                            '/maxthon/i'    =>  'Maxthon',
                            '/konqueror/i'  =>  'Konqueror',
                            '/mobile/i'     =>  'Handheld Browser'
                        );

    foreach ($browser_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $browser    =   $value;
        }

    }

    return $browser;

}


$user_os        =   getOS();
$user_browser   =   getBrowser();
$ip=$_SERVER['REMOTE_ADDR'];
$device_details =   "<br /><strong>Browser: </strong>".$user_browser."<br /><strong>Operating System: </strong>".$user_os."<br /><strong>IP Address: </strong>".$ip."";

?>

				
				
			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-md-4 sidebar sidebar-left">
			<h2 class="page-title">Logged in details:</h2>
			<div class="widget">
			

			<?php
				echo "You have logged in from...";
				echo "<br/>";
				print_r($device_details);
			?>		
			</div>
		</aside>	
<aside class="col-md-4 sidebar sidebar-left">


<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <article>

    </article>
<script>
function success(position) {
  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcontainer';
  mapcanvas.style.height = '300px';
  mapcanvas.style.width = '300px';

  document.querySelector('article').appendChild(mapcanvas);

  var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  
  var options = {
    zoom: 15,
    center: coords,
    mapTypeControl: false,
    navigationControlOptions: {
    	style: google.maps.NavigationControlStyle.SMALL
    },
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcontainer"), options);

  var marker = new google.maps.Marker({
      position: coords,
      map: map,
      title:"You logged in location!"
  });
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success);
} else {
  error('Geo Location is not supported');
}

</script>



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
