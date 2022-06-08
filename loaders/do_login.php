<?php

$uname = check_input($_POST['username']);
$pword = check_input(md5($_POST['password']));


$log = login($uname, $pword);

if($log == 1){
	
	echo('1');
} elseif($log == 2){
	
	echo('Username or password is incorrect');
}

?>
