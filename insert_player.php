<?php

session_start();

$filePath = "game_registry.php";
$filePathLogin = "game_match.php"; 
$fileName = "player"; 
$tableName = $fileName;
$columnOneName = "nick_name";
$columnTwoName = "email";
$columnThreeName = "passwd";
$columnFourName = "state";

if(isset($_POST['register'])){

	include_once 'connect.php';
	include_once 'input_cleaner.php';
    
	$userName = ms_escape_string($_POST["userNickName"]);
	$userEmail = ms_escape_string($_POST["userEmail"]);
	$userPasswordOne = ms_escape_string($_POST["userPasswordOne"]);
	$userPasswordTwo = ms_escape_string($_POST["userPasswordTwo"]);

  if($userPasswordOne != $userPasswordTwo){
		header("Location: ".$filePath."?".$fileName."=registry_password_match");
		exit();
	}

  $userPassword = $userPasswordOne;

	if(empty($userEmail)||empty($userEmail)||empty($userPassword)){
		header("Location: ".$filePath."?".$fileName."=registry_empty");
		exit();
	}else{
		if(!preg_match("/^[a-zA-Z0-9-._ ?!]*$/",$userName)||!preg_match("/^[a-zA-Z0-9-._@]*$/",$userEmail)|| !preg_match("/^[a-zA-Z0-9-_?!.,*]*$/",$userPassword)){
			header("Location: ".$filePath."?".$fileName."=registry_invalid");
		exit();
		}else{
			
			$sql = "SELECT * FROM $tableName WHERE $columnOneName='$userEmail' AND $columnThreeName='1'";
			$params = array();
			$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
			$stmt = sqlsrv_query( $conn, $sql, $params, $options);
			$stmtlen = sqlsrv_num_rows($stmt); 
				
			if($stmtlen!=0){
				//multiple active accounts with the same email reference
				header("Location: ".$filePath."?".$fileName."=registry_taken");
				exit();
			}else{

        $sql = "INSERT INTO $tableName ($columnOneName,$columnTwoName,$columnThreeName,$columnFourName) VALUES ('$userName','$userEmail','$userPassword',1)";
        $params = array();

        $stmt = sqlsrv_query( $conn, $sql, $params);

        if( $stmt === false ) {
          die( print_r( sqlsrv_errors(), true));
        }

        $sql = "SELECT * FROM $tableName WHERE $columnTwoName='$userEmail'";
        $params = array();

        $stmt = sqlsrv_query( $conn, $sql, $params);

        $row = sqlsrv_fetch_array($stmt);

        //session_unset();
        //session_destroy();

				$_SESSION['u_id'] = $row['id'];
				$_SESSION['u_name'] = $row['nick_name'];
				$_SESSION['u_email'] = $row['email'];
        
        sleep(5);
        
        session_start();

				header("Location: ".$filePathLogin."?".$fileName."=registry_success");
				exit();	
			}
		}
	}
}
?>    