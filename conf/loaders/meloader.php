<?php

die("yes");

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}


  $now = time();
$limit = $now - 600;
if (isset ($_SESSION ['last_activity']) && $_SESSION['last_activity'] < $limit) {
		
		unset($_SESSION['diexsplive']);

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
if (isset($_SESSION['diexsplive'])) {
  $colname_diexusr = $_SESSION['diexsplive'];
}




$uqaure = sprintf("SELECT * FROM dx_user WHERE dxid = %s", GetSQLValueString($colname_diexusr, "int"));
$query_diexusr = $diex_dbz->query($uqaure);
$row_usr_fetch = $query_diexusr->fetch_assoc;
$row_usr_count = $query_diexusr->num_rows;


////mysql_select_db($database_diex, $diex);
//$query_diexusr = sprintf("SELECT * FROM dx_user WHERE dxid = %s", GetSQLValueString($colname_diexusr, "int"));
//$diexusr = mysql_query($query_diexusr, $diex) or die(mysql_error());
//$row_diexusr = mysql_fetch_assoc($diexusr);
//$totalRows_diexusr = mysql_num_rows($diexusr);$colname_diexusr = "-1";

//if (isset($_SESSION['evedarexdiex'])) {
//  $colname_diexusr = $_SESSION['evedarexdiex'];
//}
//mysql_select_db($database_diex, $diex);
//$query_diexusr = sprintf("SELECT * FROM dx_user WHERE dxid = %s", GetSQLValueString($colname_diexusr, "int"));
//$diexusr = mysql_query($query_diexusr, $diex) or die(mysql_error());
//$row_diexusr = mysql_fetch_assoc($diexusr);
//$totalRows_diexusr = mysql_num_rows($diexusr);

//mysql_free_result($diexusr);

$me = array(
"id" => $row_usr_fetch['dxid'],
"name"=>$row_usr_fetch['dxname'],
"email"=>$row_usr_fetch['dxem'],
"phone"=>$row_usr_fetch['dxphone'],
"sex"=>$row_usr_fetch['genda'],
"access"=>$row_usr_fetch['acslv'],
"active"=>$row_usr_fetch['active'],
"suspended"=>$row_usr_fetch['suspend'],
"type"=>$row_usr_fetch['type'],
"pcount"=>$row_usr_fetch['pagecount'],
"ball"=>$row_usr_fetch['ball'],
"did" => md5('di'.$row_usr_fetch['dxid'].$row_usr_fetch['dxname'].$row_usr_fetch['dxname'].$row_usr_fetch['dxp'].'ex'),
);

?>