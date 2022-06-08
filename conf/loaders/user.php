<?php require_once('../Connections/diex.php');

if($_SESSION['evedarexdiex']=="")
{
	header("Location: ".$base_url."/myaccount");
}

  $now = time();
$limit = $now - 1000000000;
if (isset ($_SESSION ['last_activity']) && $_SESSION['last_activity'] < $limit) {
		
		unset($_SESSION['evedarexdiex']);

	$_SESSION = array();
	
	if(session_destroy())
	{
		header("Location: ".$base_url);
	}
  header("Location: ".$base_url);
  exit;
  } else {
	$_SESSION['last_activity']=$now;
}

 ?>
<?php
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







if (isset($_SESSION['evedarexdiex'])) {
  $colname_diexusr = $_SESSION['evedarexdiex'];
}
mysql_select_db($database_diex, $diex);
$query_diexusr = sprintf("SELECT * FROM dx_user WHERE dxid = %s", GetSQLValueString($colname_diexusr, "int"));
$diexusr = mysql_query($query_diexusr, $diex) or die(' oopse! Something went wrong');
$row_diexusr = mysql_fetch_assoc($diexusr);
$totalRows_diexusr = mysql_num_rows($diexusr);

mysql_free_result($diexusr);
?>
<?php
$me = array(
"id" => $row_diexusr['dxid'],
"name"=>$row_diexusr['dxname'],
"email"=>$row_diexusr['dxem'],
"phone"=>$row_diexusr['dxphone'],
"sex"=>$row_diexusr['genda'],
"access"=>$row_diexusr['acslv'],
"active"=>$row_diexusr['active'],
"suspended"=>$row_diexusr['suspend'],
"type"=>$row_diexusr['type'],
"pcount"=>$row_diexusr['pagecount'],
"ball"=>$row_diexusr['ball'],
"did" => md5('di'.$row_diexusr['dxid'].$row_diexusr['dxname'].$row_diexusr['dxname'].$row_diexusr['dxp'].'ex'),
);

?>