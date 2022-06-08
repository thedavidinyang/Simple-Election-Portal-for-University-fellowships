<?php

if(empty($_POST['unit'])){
	die('are you kidding me?');
} else {
$unit = $krypton->decrypt($_POST['unit']) ;
}


if(empty($_POST['ballot'])){
	
	die('Please cast your vote');
} else{
	$vote = $_POST['ballot'];
	$vote = check_input($vote);
}

$data=[
	"user"=> $me['dxid'],
	"unit" => $unit,
	"vote" => $vote
];

$stmt = $db_con->prepare("INSERT INTO diex_vote (uid, unit, vote) VALUES (:user, :unit, :vote)");
if($stmt->execute($data)){
	die('1');
} else{
	die("Please refresh your browser and try again");
}
?>