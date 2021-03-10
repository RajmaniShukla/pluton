<!DOCTYPE html>
<html lang="en">
<?php
require('connect.inc.php');
session_start();
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="layout" content="main"/>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
    <script src="js/jquery/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <link href="css/customize-template.css" type="text/css" media="screen, projection" rel="stylesheet" />
     <style>
    </style>
	<style>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
	 Complaint Form
</title><link media="all" href="IC3 Complaint Referral Form_files/styles.min.css" type="text/css" rel="stylesheet"><style id="printDraft" type="text/css" media="print">
        body:before,body:after { color:#f00;position:fixed;line-height:1em;text-align:center;width:100%;font-size:150%;z-index:-100;opacity:0.7;filter:Alpha(opacity=70);content:"This is a draft complaint and has not been submitted to the IC3." }
        body:after { bottom:0; }
        body:before { top:0; }
        #captcha,#privacyact,button { display:none; }
    </style>
        <script type="text/javascript" async="" src="IC3 Complaint Referral Form_files/recaptcha__en.js.download"></script><script src="./IC3 Complaint Referral Form_files/jquery-2.2.1.min.js.download" type="text/javascript"></script>
        <script src="IC3 Complaint Referral Form_files/api.js.download"></script>
	</style>	
</head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                   <?php 
								if($_SESSION['u1']=="")
                                  {
	                                header("Location:login.php");
                                       }
                                       else
                                          {
	                                         echo $_SESSION['u1'];
                                             }
                                                ?>
            </div>
        </div>

        <div id="body-container">
            <div id="body-content">
                
                    <div class="body-nav body-nav-horizontal body-nav-fixed">
                        <div class="container">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="icon-dashboard icon-large"></i> Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-calendar icon-large"></i> Schedule
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-map-marker icon-large"></i> Map It
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-tasks icon-large"></i> Widgets
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-cogs icon-large"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-list-alt icon-large"></i> Forms
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="icon-bar-chart icon-large"></i> Charts
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                
        <section class="nav nav-page">
        <div class="container">
            <div class="row">
                <div class="span7">
                    <header class="page-header">
                        <h3><br/>
                            <small>Additiona</small>
                        </h3>
                    </header>
                </div>
                <div class="page-nav-options">
                    <div class="span9">
                        <ul class="nav nav-pills">
                            <li>
                                <a href="#"><i class="icon-home icon-large"></i></a>
                            </li>
                        </ul>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#"><i class="icon-home"></i>Home</a>
                            </li>
                            <li><a href="#">Maps</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
              </section>
                 <section class="page container">
        <div class="row">
            <div class="span8">
                <div class="box">
                    <div class="box-header">
                        <i class="icon-bookmark"></i>
                        <h5>Shortcuts</h5>
                    </div>
                    <div class="box-content">
                        <div class="btn-group-box">
                            <button class="btn"><i class="icon-dashboard icon-large"></i><br/>Dashboard</button>
                            <button class="btn"><i class="icon-user icon-large"></i><br/>Account</button>
                            <button class="btn"><i class="icon-search icon-large"></i><br/>Search</button>
                            <button class="btn"><i class="icon-list-alt icon-large"></i><br/>Reports</button>
                            <button class="btn"><i class="icon-bar-chart icon-large"></i><br/>Charts</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
             <div class="span16">
                <div class="row">
                    <div class="span8">
<script type="text/javascript">
    google.load('visualization', '1', {'packages': ['corechart']});
    google.setOnLoadCallback(drawVisualization);
    
    function drawVisualization() {
        visualization_data = new google.visualization.DataTable();
        visualization_data.addColumn('string', 'Task');
        visualization_data.addColumn('number', 'Hours per Day');
        visualization_data.addRow(['Work', 11]);
        visualization_data.addRow(['Eat', 2]);     
        visualization_data.addRow(['Commute', 2]);
        visualization_data.addRow(['Watch TV', 2]);
        visualization_data.addRow(['Sleep', 7]); 
        visualization = new google.visualization.PieChart(document.getElementById('piechart'));
        visualization.draw(visualization_data, {title: 'My Daily Activities', height: 260});

    }
</script>              
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="span8">
                <div class="box pattern pattern-sandstone">
                    <div class="box-header">
                        <i class="icon-list"></i>
                        <h5>Lists</h5>
                        <button class="btn btn-box-right" data-toggle="collapse" data-target=".box-list">
                            <i class="icon-reorder"></i>
                        </button>
                    </div>
                    <div class="box-content box-list collapse in">
                        <ul>
                            <li>
                                <div>
                                    <a href="#" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                                    <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            
                        </ul>
                        <div class="box-collapse">
                            <button class="btn btn-box" data-toggle="collapse" data-target=".more-list">
                                Show More
                            </button>
                        </div>
                        <ul class="more-list collapse out">
                            <li>
                                <div>
                                    <a href="#" class="news-item-title">Duis aute irure dolor in reprehenderit</a>
                                    <p class="news-item-preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                                </div>
                            </li>
                            
                        </ul>
                    </div>

                </div>
            </div>
            
               
                </div>
            </div>
        </div>
		
        <center> 
            <div class="span8">
                <div class="blockoff-left">
                    <p>
                       <iframe width="1020px" height="920px" src="formuser.php" frameborder="0" allowfullscreen>
					 </iframe>
                    </p>
                </div>
            </div></center>

    </section>
	
	<div>
	</div>
	
	
	
	        <div id="spinner" class="spinner" style="display:none;">
            Loading&hellip;
        </div>

        <footer class="application-footer">
            <div class="container">
                <p>Application Footer</p>
                <div class="disclaimer">
                    <p>All right reserved.</p>
                    <p>Copyright © </p>
                </div>
            </div>
        </footer>
        
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
        <script type="text/javascript">
        $(function() {
            $('#sample-table').tablesorter();
            $('#datepicker').datepicker();
            $(".chosen").chosen();
        });
    </script>

	</body>
</html>