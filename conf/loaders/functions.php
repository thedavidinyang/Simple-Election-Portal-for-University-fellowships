<?php



function checkvote($uid, $unit){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_vote WHERE  uid=:pid AND unit=:unit ");
			$quan->execute([ 'pid'=>$uid, 'unit'=> $unit]);
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(!empty($count)){
		return(1);
	} else{
		return(0) ;
	}
}



function unitcode(){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_unit ");
			$quan->execute();
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(!empty($count)){
		do{
		echo("<p>".$qrow['name']." Unit -  ".$qrow['id']."</p>");
		}while ($qrow = $quan->fetch());
	} else{
		return(0) ;
	}
}

function getunitname($pid){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_unit WHERE  id=:pid");
			$quan->execute([ 'pid'=>$pid]);
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(!empty($count)){
		return($qrow['name']);
	} else{
		return(0) ;
	}
}



function countvotes(){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_vote");
			$quan->execute();
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(empty($count)){
		return(0);
	} else{
		return($count) ;
	}
}

function tunits(){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_unit");
			$quan->execute();
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(empty($count)){
		return(0);
	} else{
		return($count) ;
	}
}
function tmemb(){

		global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_user WHERE type !=0");
			$quan->execute();
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(empty($count)){
		return(0);
	} else{
		return($count) ;
	}
}




//// verify paystack transaction

function very_trans($transid){
	global $skey;

	$request = array();
	$curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/:reference",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer ".$skey."",
      "Cache-Control: no-cache",
    ),
  ));

$request = curl_exec($curl);

curl_close($curl);


if ($request) {
  $result = json_decode($request, true);
}
	if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
		return(1);
	} else {

		return(0);
	}
}



function adminname($id){

	global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_auser WHERE id=:id");
			$quan->execute(['id' => $id]);
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(empty($count)){
		return("Suspecious Activity");
	} else{


	return $qrow["name"] ;
	}
}





	function dxpaz($lenght = 6) {

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPPQRSTUVQXYZ';
	$characterlenght = strlen($characters);
	$randomid = '';
	for ($i = 0; $i < $lenght; $i++) {
		$randomid .= $characters [rand (0, $characterlenght -1)];
	}
	return $randomid;


	}



	function procode($lenght = 6) {

	$characters = '0123456789';
	$characterlenght = strlen($characters);
	$randomid = '';
	for ($i = 0; $i < $lenght; $i++) {
		$randomid .= $characters [rand (0, $characterlenght -1)];
	}
	return $randomid;


	}

	function transid($lenght = 10) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characterlenght = strlen($characters);
		$randomid = '';
		for ($i = 0; $i < $lenght; $i++) {
			$randomid .= $characters [rand (0, $characterlenght -1)];
		}
		return $randomid;


		}


		function tranref($lenght = 20) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characterlenght = strlen($characters);
		$randomid = '';
		for ($i = 0; $i < $lenght; $i++) {
			$randomid .= $characters [rand (0, $characterlenght -1)];
		}
		return $randomid;


		}
		function genpin($lenght = 6) {

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characterlenght = strlen($characters);
		$randomid = '';
		for ($i = 0; $i < $lenght; $i++) {
			$randomid .= $characters [rand (0, $characterlenght -1)];
		}
		return $randomid;


		}

function login($uname, $pword){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE uname=:user  AND pazz=:pass");
	$stmt->execute(['user' => $uname, 'pass'=> $pword]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();

	if(!empty($count)){
		$_SESSION['diex-systems-pfcu'] = $row["id"];
		return '1';
	} else {
		return '2';
	}


}


function logout(){
	unset($_SESSION['diex-systems-pfcu']);
	if(session_destroy())
{
return '1';
}

}

function alogout(){
	unset($_SESSION['diex-systems-pfcu']);
	if(session_destroy())
{
return '1';
}

}




function diexkryptoninan($lenght = 24) {

	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@%#$!^&*()=-[]{}":;?/><.,\|`~';
	$characterlenght = strlen($characters);
	$randomid = '';
	for ($i = 0; $i < $lenght; $i++) {
		$randomid .= $characters [rand (0, $characterlenght -1)];
	}
	return $randomid;


	}


	function evkobo($id) {
		$amnt = explode('.',$id);
		$nai = $amnt[0];
		$kobs = $amnt[1];


		if(empty($kobs)){

			$kobs = '00';

			$kobo = $nai.$kobs;

		} else {

			$kobc = strlen($kobs);

			if ($kobc == 2){

		   //$kobs = $kobs.'0';
		   $kobo = $nai.$kobs;

			} else {

			$kobo = str_replace('.','',$id);
			$kobo = $kobo.'00';
			}
		}


	   $value = $kobo;

	   return $value;

   }


   function check_input($data) {
	$data = strip_tags($data);
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function verifypagemail($data) {

	if (!filter_var ($data, FILTER_VALIDATE_EMAIL)){
		return 'Incorrect Email';
	} else{

		return '1';
	};

};

function verifyphone($data){
if(!is_numeric($data)) {
echo 'please enter a valid phone number';
} else if(strlen($data) < 6) {
		return 'invalid phone number oh';
} else {
return '1';
}
}





function vmail($data) {

		if (!filter_var ($data, FILTER_VALIDATE_EMAIL)){
			return 'Incorrect Email';
		} else{

			return '1';
		};

	};

function checkemail($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE email=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	if(!empty($count)){
		return '1';
	} else {

		return '0';
	}
}


function checkuname($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE uname=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	if(!empty($count)){
		return '1';
	} else {

		return '0';
	}
}



function username($data){
		if (strlen($data) < 6) {
			$len = '6';
			return $len;}
			else{
	$data= preg_match('/^[a-z0-9]+$/',$data);
	return $data;}
	}


function spleg($spon){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $spon]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();

	if(empty($count)){
		return '0';
	} else {

		return(ucwords($row['fname'])." - ".$row['usid']);

	}
}

function checkpin($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_pin WHERE pin=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();



	if(empty($count)){

		return '0';
	} else {

		if(empty($row["user"])){
		return '1';

		}  else {
			return '2';
		}

	}
}


function getid($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE usid=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	if(!empty($count)){
		return $row["id"];
	} else {

		return 0;
	}
}
function getustype($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	if(!empty($count)){
		return $row["type"];
	} else {

		return 0;
	}
}

function getpackamnt($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_packages WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	if(!empty($count)){
		return $row["amnt"];
	} else {

		return 0;
	}
}
function getpackid($id){
	global $db_con;
	$stmt = $db_con->prepare("SELECT * FROM diex_packages WHERE amnt=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	if(!empty($count)){
		return $row["id"];
	} else {

		return 0;
	}
}



function getupid($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["usid"];
	} else {

		return 0;
	}
}
function checkuid($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE usid=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return 1;
	} else {

		return 0;
	}
}
function checkpackz($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_packages WHERE amnt=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();
	if(!empty($count)){
		return 1;
	} else {

		return 0;
	}
}

function getmessage($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_messages WHERE reff=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["message"];
	} else {

		return 0;
	}
}
function getfname($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["fname"];
	} else {

		return 0;
	}
}
function getspfname($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE usid=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["fname"];
	} else {

		return 0;
	}
}


function getupuname($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["uname"];
	} else {

		return 0;
	}
}
function getuname($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["uname"];
	} else {

		return 0;
	}
}
function instransgetfname($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
		return $row["fname"];
	} else {

		return 0;
	}
}


function closejob($id){
	global $db_con;

		$stmt = $db_con->prepare("UPDATE diex_job SET status=:nb WHERE id=:id");
			$stmt->execute([ 'nb'=> 0, 'id'=> $id]);
	}
function deljob($id){
	global $db_con;
	

		$stmt = $db_con->prepare("DELETE FROM diex_job WHERE id=:id");
			$stmt->execute(['id'=> $id]);
		$stmt = $db_con->prepare("DELETE FROM diex_jobs WHERE jid=:id");
			$stmt->execute(['id'=> $id]);
		$stmt = $db_con->prepare("DELETE FROM diex_comp_jobs WHERE jid=:id");
			$stmt->execute(['id'=> $id]);
	
	}

function upusbal($id, $amt){
	global $db_con;

		$stmt = $db_con->prepare("UPDATE diex_user SET cba=:nb WHERE id=:id");
			$stmt->execute([ 'nb'=> $amt, 'id'=> $id]);
	}

function upuserbal($id, $amt){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


	if(!empty($count)){
	$nb =	$row["cba"] + $amt;
		$stmt = $db_con->prepare("UPDATE diex_user SET cba=:nb WHERE id=:id");
			$stmt->execute([ 'nb'=> $nb, 'id'=> $id]);
	}
}

function updlns($id){
	global $db_con;

	$stmt = $db_con->prepare("UPDATE diex_user SET td=:dlns WHERE id=:id");
			$stmt->execute($id);
}


function adlns1($id){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id");
	$stmt->execute([ 'id'=> $id]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();

	if(!empty($count)){

		$data = [
			'id' => $row['id'],
			'dlns' => $row['td'] +=1
		];

		updlns($data);


	}
}


function instrans($id){
	global $db_con;

		$query = "INSERT INTO diex_trans (transid, uid, type, amnt, descr) VALUES (:transid, :uid, :type, :amnt, :descr)";
				$stmt = $db_con->prepare($query);
				$stmt->execute($id);


}


function instransreg($id){
	global $db_con;

		$query = "INSERT INTO diex_trans (transid, uid, type, amnt, descr, status) VALUES (:transid, :uid, :type, :amnt, :descr, :status)";
				$stmt = $db_con->prepare($query);
				$stmt->execute($id);


}

function instranswith($id){
	global $db_con;

		$query = "INSERT INTO diex_trans (transid, uid, type, amnt, descr, status, with) VALUES (:transid, :uid, :type, :amnt, :descr, :status, :with)";
				$stmt = $db_con->prepare($query);
				$stmt->execute($id);


}
function instransdeb($id){
	global $db_con;

		$query = "INSERT INTO diex_trans (transid, uid, type, amnt, descr, status) VALUES (:transid, :uid, :type, :amnt, :descr, :status)";
				$stmt = $db_con->prepare($query);
				if($stmt->execute($id)){
					return(1);
				} else{
					return(2);
				}


}








///////////admin functions
function aptrans($id){
	global $db_con;

	$stmt = $db_con->prepare("UPDATE diex_trans SET status=:status, apby=:user  WHERE id=:id");
			$stmt->execute($id);
}
function compbals($id){
	global $db_con;

	$stmt = $db_con->prepare("UPDATE diex_set SET cb=:cb  WHERE id=:id");
			$stmt->execute($id);
}
function compprofit($id){
	global $db_con;

	$stmt = $db_con->prepare("UPDATE diex_set SET ci=:ci  WHERE id=:id");
			$stmt->execute($id);
}



function tusers(){
	global $db_con;

	$stmt = $db_con->prepare("SELECT * FROM diex_user ");
	$stmt->execute();
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


		return $count;

}

function pendwith(){
	global $db_con;

		$stmt = $db_con->prepare("SELECT * FROM diex_trans WHERE wit=1 AND status=:status ");
	$stmt->execute(['status' => 0]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


		return $count;

}
function unpin(){
	global $db_con;

		$stmt = $db_con->prepare("SELECT * FROM diex_pin WHERE user=:status ");
	$stmt->execute(['status' => 0]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


		return $count;

}
function upin(){
	global $db_con;

		$stmt = $db_con->prepare("SELECT * FROM diex_pin WHERE user !=:status ");
	$stmt->execute(['status' => 0]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


		return $count;

}

function compbal(){
	global $db_con;

		$stmt = $db_con->prepare("SELECT * FROM diex_pin WHERE user !=:status ");
	$stmt->execute(['status' => 0]);
	$count = $stmt->rowCount();
	$row = $stmt->fetch();


		return $count;

}


function getbnk($id){

	global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_bank WHERE user=:id ");
			$quan->execute(['id' => $id]);
			$qrow = $quan->fetch();


	do{


		echo" <hr><b><p> Bank Name ".$qrow['dname']." </p> <p> Account Number: ".$qrow['bnum']." </p> <p>".$qrow['acname']."</p> </b><hr> ";

	}while ($qrow = $quan->fetch());;

}
function getubal($id){

	global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_user WHERE id=:id ");
			$quan->execute(['id' => $id]);
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	if(!empty($count)){
		return($qrow['cba']);
	}
	
}


function check_admin($id){

	global $db_con;

	$quan = $db_con->prepare("SELECT * FROM diex_auser WHERE uname=:id");
			$quan->execute(['id' => $id]);
			$qrow = $quan->fetch();
	$count = $quan->rowCount();
	return $count;
}


function remove_usr($id){

	global $db_con;


	$stmt = $db_con->prepare("DELETE FROM diex_auser WHERE id=:id");
			$stmt->execute([ 'id'=> $id]);
	
	

}

function remove_with($id){

	global $db_con;


	$stmt = $db_con->prepare("DELETE FROM diex_trans WHERE id=:id");
			if($stmt->execute([ 'id'=> $id])){
				return(1);
			} else {
				
				return("Please refresh your browser and try again");
			}
	

}
function remove_jusr($id){

	global $db_con;
		$stmt = $db_con->prepare("SELECT * FROM diex_user WHERE id=:user");
			$stmt->execute(['user' => $jid]);
	$count = $stmt->rowCount();
if(!empty($count)){	
	$stmt = $db_con->prepare("DELETE FROM diex_user WHERE id=:id");
		
	
	
if($stmt->execute([ 'id'=> $id])){	
	
	return(1);
} else {	
	return("Something went wrong, please refresh your browser and try againz");
	}
} else {	
	return("Something went wrong, please refresh your browser and try againa");
	}


}

function remove_jcomp($id){
	global $db_con;
$stmt = $db_con->prepare("SELECT * FROM diex_comp_jobs WHERE uid=:user");
			$stmt->execute(['user' => $jid]);
	$count = $stmt->rowCount();
	if(!empty($count)){	
		$stmt = $db_con->prepare("DELETE FROM diex_comp_jobs WHERE uid=:id");
		$stmt->execute([ 'id'=> $id]);
	} else {	
	return ("Something went wrong, please refresh your browser and try again");
	}
}

function approve_job($id){
	global $db_con;
	
		$stmt = $db_con->prepare("SELECT * FROM diex_comp_jobs WHERE id=:user ORDER BY id DESC");
			$stmt->execute(['user' => $id]);
		$count = $stmt->rowCount();
			$row_comp = $stmt->fetch();
	if(!empty($count)){
		
		$stmt = $db_con->prepare("SELECT * FROM diex_jobs WHERE jid=:user ORDER BY id DESC");
			$stmt->execute(['user' => $row_comp['jid']]);
		$count = $stmt->rowCount();
			$row = $stmt->fetch();
		
		if(empty($count)){
			
			return('0');
		} else {
			$jref = getjobref($row['jid']);
			$given = $row['given'] + 1;
			$amnt = 0;
			do{
				if(empty($row['cp'])){
					$csh = getjobprice($row['jplat'], getustype($row_comp['uid'])) ;
				} else {
					$csh = $row['cp'];
				}
				$amnt += $csh;
				
				$ubal = $amnt + getubal($row_comp['uid']);
			}while ($row = $stmt->fetch());
			
			
			$upubal = [
				'user' => $row_comp['uid'],
				'bal' => $ubal
			];
			
			$upbal =$db_con->prepare("UPDATE diex_user SET cbs=:bal WHERE id=:user");
			$upbal = $upbal->execute($upubal);
			
			$poststat = [
				'id' => $id,
				'status' => 1
			] ;
			
			$upbal =$db_con->prepare("UPDATE diex_comp_jobs SET status=:status WHERE id=:id");
			$upbal = $upbal->execute($upubal);
			
			$postgiven = [
				'id' => $row['id'],
				'given' => $given
			] ;
			
			$upbal =$db_con->prepare("UPDATE diex_jobs SET given=:given WHERE id=:id");
			$upbal = $upbal->execute($upubal);
			
								
						//add register transaction
	$transid = "MT-".transid();
		$tranza = [
			'transid' => $transid, 
			'uid' => $row_comp['uid'], 
			'type' => '1', 
			'amnt' => $csh, 
			'descr' => "Job completion deposit ref: #".$jref,
			'status' => "1"
		];
	
	instransreg($tranza);
			
			return('1');
		}
		
		} else {
		
		return('0');
	}
	
	
}

?>
