<?php



session_start();


$filePath = "game_intro.php";
$filePathLogin = "game_match.php"; 
$fileName = "player"; 
$tableName = $fileName;
$columnOneName = "email";
$columnTwoName = "passwd";
$columnThreeName = "state";

if(isset($_POST['login'])){

	include_once 'connect.php';
	include_once 'input_cleaner.php';

	$userEmail = ms_escape_string($_POST["userEmail"]);
	$userPassword = ms_escape_string($_POST["userPassword"]);

	if(empty($userEmail)||empty($userPassword)){
		header("Location: ".$filePath."?".$fileName."=login_empty");
		exit();
	}else{
		if(!preg_match("/^[a-zA-Z0-9-._@]*$/",$userEmail)|| !preg_match("/^[a-zA-Z0-9-_?!.,*]*$/",$userPassword)){
			header("Location: ".$filePath."?".$fileName."=login_invalid");
		exit();
		}else{
			
			$sql = "SELECT * FROM $tableName WHERE $columnOneName='$userEmail' AND $columnThreeName='1'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
				
			if($stmtlen!=1){
				//multiple active accounts with the same email reference
				header("Location: ".$filePath."?".$fileName."=login_multiple_active");
				exit();
			}else{
				if($row = sqlsrv_fetch_array($stmt)){
					if( $userEmail!=$row[$columnOneName] || 
							$userPassword!=$row[$columnTwoName] || 
							1!=$row[$columnThreeName]){
						header("Location: ".$filePath."?".$fileName."=login_invalid_password");
						exit();
					}else{
						
						$_SESSION['u_id'] = $row['id'];
						$_SESSION['u_name'] = $row['nick_name'];
						$_SESSION['u_email'] = $row['email'];
						
						header("Location: ".$filePathLogin."?".$fileName."=login_success");
						exit();	
					}
				}
			}
		}
	}

}else if(isset($_POST['logout'])){
	session_unset();
	session_destroy();
	header("Location: ".$filePath."?".$fileName." = logout_success");
	exit();
	
}

?>