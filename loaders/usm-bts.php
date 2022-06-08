  <?php

if(isset($_POST['a']) ){

	$action = $krypton->decrypt($_POST['a']) ;

	switch($action){
		case "edit_profile":

			if(empty($_POST['email'])){

				die("Please enter email");
			} else {
				
				
					if (vmail($_POST["email"]) == 1) {
			$mail = $_POST["email"] ;
			$emcheck = 1;
		
	} else {
		die("Please enter a valid email");
	}
			}
			if(empty($_POST['name'])){

				die("Please enter full name");
			} else {

				$name = check_input($_POST['name']);
			}
			if(empty($_POST["number"])){
				die("Please enter your phone number");
			} else {
				if(!is_numeric($_POST["number"])) {
				} else if(strlen($_POST["number"]) < 11 || strlen($_POST["number"]) > 13) {
					die('Invalid phone number');
				} else {
					$phone = $_POST["number"];
					$phcheck = 1;
				}
			}
			$data = [
				"name" => $name,
				"phone" => $phone,
				"mail" => $mail,
				"user" => $me['dxid']
			];


				$stmt = $db_con->prepare("UPDATE diex_user SET fname=:name, phone=:phone, mail=:mail WHERE id=:user");
				if($stmt->execute($data)){

					die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			break;


		case "edit_bank":

    if(empty($_POST['bank_name'])){

        die("Please enter bank name");
      } else {

        $bname = check_input($_POST['bank_name']);
      }
      if(empty($_POST['account_name'])){

        die("Please enter Account name");
      } else {

        $acname = check_input($_POST['account_name']);
      }
      if(empty($_POST['account_number'])){

        die("Please enter Account number");

      } elseif(!is_numeric($_POST['account_number'])){

        die("Enter a valid account number");

      } else {

        $acnumber = check_input($_POST['account_number']);
      }

      $data = [
        "bname" => $bname,
        "acname" => $acname,
        "acnum" => $acnumber,
        "id" => $bank['id']
      ];



        $stmt = $db_con->prepare("UPDATE diex_bank SET dname=:bname, bnum=:acnum, acname=:acname WHERE id=:id");		
				if($stmt->execute($data)){

					die('1');
				} else{

					die("Something went wrong, please check your network and try again");
				}
			break;



		case "edit_password":


			if(empty($_POST['cp'])){
				die("Please enter current password");
			}

			if(empty($_POST['p1'])){
				die("Please enter new password");
			} elseif(strlen($_POST['p1']) < 6){
				die("Password must be more than 6 characters");
			} else {
				$p1 = check_input($_POST['p1']);
			}



			if(empty($_POST['p2'])){
				die("Please enter new password");
			} elseif(strlen($_POST['p2']) < 6){
				die("Password must be more than 6 characters");
			} else {
				$p2 = check_input($_POST['p2']);

				}



			if($p1 != $p2){
				die("Pins don't match");
			} elseif(md5($_POST['cp']) != $me['pass']){
				die('invalid Password');
			} else {
				$data = [
					"pass" => md5($p2),
					"id" => $me['dxid']
				];

				$stmt = $db_con->prepare("UPDATE diex_user SET pazz=:pass  WHERE id=:id");
				$stmt->execute($data);

				die('1');

		}

			break;




	}


}


?>
