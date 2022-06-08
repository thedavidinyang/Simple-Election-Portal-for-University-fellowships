<?php

if(isset($_REQUEST['u'])){
				define('INDEX', false);
				include("conf/conf.php");
			}




	if(!empty($me['dxid'])){

		if((isset($_REQUEST['u'])) && ($_REQUEST['u'] == "out")){

			require_once("loaders/".$_REQUEST["u"].".php");
		} else {

	



			if(!isset($_REQUEST['u'])){
			require_once("loaders/home.php");
		} else {
if (file_exists("loaders/".$_REQUEST["u"].".php")) {
    require_once("loaders/".$_REQUEST["u"].".php");
} else {
    require_once("loaders/404.php");
}
}

		

	}
	} else {
		if(!isset($_REQUEST['u'])){
			require_once("loaders/home.php");
		} else {
	if (file_exists("loaders/".$_REQUEST["u"].".php")) {
    require_once("loaders/".$_REQUEST["u"].".php");
} else {
    require_once("loaders/home.php");
}
}
	}






?>
