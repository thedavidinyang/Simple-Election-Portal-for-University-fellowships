<?php


define('INDEX', false);

include("conf/conf.php");
if(!isset($_REQUEST['p'])){
		include("inc/head.php") ;
			require_once("loader/home.php");
	 include("inc/foot.php") ;
		} else {
		
		if(!empty($me["dxid"])){
	
	header("Location: ".$dcon->base_url."/dashboard" );
} else {
	include("inc/head.php") ;
	require_once("loader/".$_REQUEST["p"].".php");
			 include("inc/foot.php") ;
			
		}
}







 
 


?>