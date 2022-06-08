  <?php


if(isset($_POST['a']) ){

	$action = $krypton->decrypt($_POST['a']) ;

	switch($action){
		case "finish":



			
		case "delete_user":
			if(empty($_POST['j'])){
				die("Something went wrong, refresh your browser and try again.");
			} else {
				$jid = $krypton->decrypt($_POST['j']) ;
				if(empty($jid)){
					die("Something went wrong, refresh your browser and try again.");
				}else{
					$jid = check_input($jid);
				}
			}
			$data = ["jid" => $jid ];
			$query =" DELETE FROM diex_vote WHERE id=:jid";
				$stmt = $db_con->prepare($query);
				if($stmt->execute($data)){
					die('1');
				} else{
					die("Something went wrong, please check your network and try again");
				}
			break;



			
	


			

	}


}


?>