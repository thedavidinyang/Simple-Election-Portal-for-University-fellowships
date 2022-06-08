<?php


  $now = time();
//$limit = $now - 600;
$limit = $now - 600;
if (isset ($_SESSION ['last_activity']) && $_SESSION['last_activity'] < $limit) {

		unset($_SESSION['diex-systems-pfcu']);
		$_SESSION = array();
	unset($_SESSION['diex-systems-pfcu']);


	$_SESSION = array();

	if(session_destroy())
	{
		header("Location: ".$dcon->base_url );
	}
 header("Location: ".$dcon->base_url );
  exit;
  } else {
	$_SESSION['last_activity']=$now;
}


$colname_diexusr = "-1";
if (isset($_SESSION['diex-systems-pfcu'])) {
  $colname_diexusr = $_SESSION['diex-systems-pfcu'];




$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:user");
			$stmt->execute(['user' => $colname_diexusr]);
			$daiecza = $stmt->fetch();




$me = array(
"dxid" => $daiecza['id'],
"name"=>$daiecza['fname'],
"uname"=>$daiecza['uname'],
"email"=>$daiecza['mail'],
"phone"=>$daiecza['phone'],
"type"=>$daiecza['type'],
"date"=>$daiecza['date'],
"pass"=>$daiecza['pazz'],
"unit"=>$daiecza['unit'],
"lev"=>$daiecza['level'],
);


$unit = $me['unit'];
$unit = explode(',', $unit);







}


?>
