<?php
define('INDEX', false);
include("conf/conf.php");
if(empty($me["dxid"])){
	header("Location: ".$dcon->base_url );
} else {
	include("inc/header.php"); 	
	require_once('inc/sidenav.php'); 
	require_once('inc/topnav.php');
    echo('<div class="diex-page-now">');
	include('loader.php');
	echo('</div>');
	require_once('inc/footer.php');
};
?>