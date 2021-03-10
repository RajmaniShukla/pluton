<!DOCTYPE html>
<?php
require('connect.inc.php');
session_start();
?>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="layout" content="main"/>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/pluton.css">
    <link rel="stylesheet" type="text/css" href="../css/jquery.cslider.css">
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/pluton-ie7.css">
<script src="../js/jquery.cslider.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.bxslider.css">
    <script src="js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />

    <style>
		
		.wraplogo{
    text-align:center
}
.leftlogo{
    float: left;
    background:transparent
}
.rightlogo{
    float: right;
    background:transparent
}
.centerlogo{
 
    background:transparent;
    margin:0 auto;
   display:inline-block
}
	
    </style>
	
</head>
    <body>
	
<div style="background-color: #D30584;">
         <div class="wraplogo">
             <div class="leftlogo"> <img src="images/bhishma.png" alt="Logo" style="width:190px; height:150px; padding-left:30px; padding-top:10px;" />
			  </div>
					<div class="rightlogo">
					   <img src="images/MSDE logo.png" alt="Logo" align="right" style="width: 250px; height: 150px; "/>  
					</div>
                        <div class="centerlogo">
<h1>Bharatiya Interface for <br>E-Security & Help Management</h1>
	                     </div>
                </div>
            </div>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="index.html">Home</a></li>
							<li><a href="about_us.html">About Us</a></li>
                            <li><a href="incident_management.html">Incident Management</a></li>
                            <li><a href="best_practices.html">Best Practices</a></li>
                            <li><a href="dashbord/login.html">Login</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
					
                </div>
            </div>
        </div>
		<div id="body-container">
                    <div id="body-content">
       <div class='container'><div><center><h1>Welcome To Login Page</h1></center></div>
<table border="2" align="center">
<form action="" method="get">
<tr><td>Username --</td><td><input type="text" name="t1"></td></tr>
<tr><td>Password --</td><td><input type="password" name="t2"></td></tr>
<tr><td><a href="forgotpassword.php">Forgot Password</a></td>
<td><input type="submit" name="n1" value="Sign In"></td></tr>
<tr><td>Don't Have Password ?</td>
<td><a href="forgotpassword.php">Generate m-Pin</a></td></tr>
</form></table>
<?php
if(isset($_GET['n1']))
{
	$user=$_GET['t1'];
	$pswd=md5($_GET['t2']);
	$query="select * from aadhar_login where adhar_no='".$user."' and password='".$pswd."'";
	if($query_run=mysql_query($query))
	{
		$row=mysql_fetch_row($query_run);
		if($row!=0)
		{
		
		$_SESSION['u1']=$_GET['t1'];
		header("Location:dashboard.php");
		}
		else
		{
			echo "Wrong Username or Password";
		}
	}	
}
?></div></div></div>











        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application Footer</p>
                <div class="disclaimer">
                    <p>This is an example disclaimer. All right reserved.</p>
                    <p>Copyright © </p>
                </div>
            </div>
        </footer>
        <script type="text/javascript">
            $(function(){
                document.forms['loginForm'].elements['j_username'].focus();
                $('body').addClass('pattern pattern-sandstone');
                $("[rel=tooltip]").tooltip();
            });
        </script>
        <script src="js/bootstrap/bootstrap-transition.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-alert.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-modal.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-dropdown.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-scrollspy.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-tab.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-tooltip.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-popover.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-button.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-collapse.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-carousel.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-typeahead.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-affix.js" type="text/javascript" ></script>
        <script src="js/bootstrap/bootstrap-datepicker.js" type="text/javascript" ></script>
        <script src="js/jquery/jquery-tablesorter.js" type="text/javascript" ></script>
        <script src="js/jquery/jquery-chosen.js" type="text/javascript" ></script>
        <script src="js/jquery/virtual-tour.js" type="text/javascript" ></script>
        

	</body>
</html>