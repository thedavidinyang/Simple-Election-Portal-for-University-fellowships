<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo($dcon->sitename) ; ?> Login</title>
    
    	<link rel="icon" type="image/png" href="<?php echo $dcon->base_url ;?>/images/logo.JPG"/>

    <link href="<?php echo($base_url) ; ?>/data/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo($base_url) ; ?>/data/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo($base_url) ; ?>/data/simple-line-icons.css">

    <link rel="stylesheet" href="<?php echo($base_url) ; ?>/data/device-mockups.min.css">

    <link href="<?php echo($base_url) ; ?>/data/new-age.min.css" rel="stylesheet">
      
           
<link href="<?php echo($base_url) ; ?>/data/style.css" rel="stylesheet" type="text/css" media="all">
            <!-- Animate.css -->
    <link href="<?php echo($base_url) ; ?>/data/animate.min.css" rel="stylesheet">

	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo($base_url) ; ?>/data/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo($base_url) ; ?>/data/jqvmap.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo($base_url) ; ?>/data/daterangepicker.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
    <link href="<?php echo($base_url) ; ?>/data/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="<?php echo($base_url) ; ?>/data/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="<?php echo($base_url) ; ?>/data/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="<?php echo($base_url) ; ?>/data/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    
      <!-- Pace style -->
  <link rel="stylesheet" href="<?php echo($base_url) ; ?>data/pace.min.css">
      
         <link href="<?php echo($base_url) ; ?>/data/pnotify.css" rel="stylesheet">
    <link href="<?php echo($base_url) ; ?>/data/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo($base_url) ; ?>/data/pnotify.nonblock.css" rel="stylesheet">
     <script src="<?php echo($base_url) ; ?>/data/jquery-1.11.3-jquery.min.js.download"></script>
     
     <style>
#ppBody
{
    font-size:11pt;
    width:100%;
    margin:0 auto;
    
}

#ppHeader
{
    
    font-size:21pt;
    width:100%;
    margin:0 auto;
}

.ppConsistencies
{
    display:none;
}


.topnav {
    background-color: #03343c;
    overflow: hidden;
	padding-left: 100px;
/*background: url(../images/bg-pattern.png),linear-gradient(to left,#031721,#2e65ca); */
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #046c7d; 
    color: darkorange;
	
}


/* Hide the link that should open and close the topnav on small screens */
.topnav .icon {
    display: none;
}


/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;
  padding-left: 10px;}
  .topnav.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
	padding-left: 10px;
  }
}
    

</style>
 


  </head>