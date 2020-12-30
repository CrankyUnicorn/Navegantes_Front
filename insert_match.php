<?php

session_start();

$filePath = "game_match.php";
$filePathTarget = "game_match.php"; 
$fileName = "match"; 


	if(isset($_POST['createMatch'])){

		include_once 'connect.php';
		include_once 'input_cleaner.php';
			
		$matchName = ms_escape_string($_POST["matchName"]);
		$characterName = ms_escape_string($_POST["characterName"]);

		if(empty($matchName)||empty($characterName)){
			header("Location: ".$filePath."?".$fileName."=match_empty");
			exit();
		}else{

			if(strlen($matchName)>60||strlen($characterName)>60){
				header("Location: ".$filePath."?".$fileName."=match_overflow");
				exit();
			}else{

				if(!preg_match("/^[a-zA-Z0-9-._ ?!]*$/",$matchName)||!preg_match("/^[a-zA-Z0-9-._ ?!]*$/",$characterName)){
					header("Location: ".$filePath."?".$fileName."=match_invalid");
				exit();
				}else{
					
					//check for already existing matches with same name
					$sql = "SELECT * FROM match WHERE match_name='$matchName' AND state='1'";
					$params = array();
					$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
					$stmt = sqlsrv_query( $conn, $sql, $params, $options);
					$stmtlen = sqlsrv_num_rows($stmt);
						
					if($stmtlen!=0){
						
						header("Location: ".$filePath."?".$fileName."=match_taken");
						exit();
					}else{

						//check for already existing matches with same name
						$sql = "SELECT * FROM character WHERE character_name='$characterName' AND state='1'";
						$params = array();
						$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
						$stmt = sqlsrv_query( $conn, $sql, $params, $options);
						$stmtlen = sqlsrv_num_rows($stmt);
							
						if($stmtlen!=0){
							
							header("Location: ".$filePath."?".$fileName."=character_taken");
							exit();
						}else{

							//creates a match
							$sql = "INSERT INTO match (match_name, state) VALUES ('$matchName', 1 )";
							$params = array();

							$stmt = sqlsrv_query( $conn, $sql, $params);

							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}

							//match id
							$sql = "SELECT * FROM match WHERE match_name='$matchName'";
							$params = array();
	
							$stmt = sqlsrv_query( $conn, $sql, $params);
							
							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}
							
							$matchId = sqlsrv_fetch_array($stmt);

							//creates a character
							$sql = "INSERT INTO character (character_name, state) VALUES ('$characterName' , 1 )";
							$params = array();
	
							$stmt = sqlsrv_query( $conn, $sql, $params);
	
							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}

							//character id
							$sql = "SELECT * FROM character WHERE character_name='$characterName'";
							$params = array();
	
							$stmt = sqlsrv_query( $conn, $sql, $params);
							
							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}
						
							$characterId = sqlsrv_fetch_array($stmt);

							//associates the character to the player 
							$sql = "INSERT INTO player_character (character_id, player_id) VALUES ('".$characterId['id']."','".$_SESSION['u_id']."')";
							$params = array();

							$stmt = sqlsrv_query( $conn, $sql, $params);

							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}
																		
							//associates the match to the player's character 
							$sql = "INSERT INTO character_match (match_id, character_id) VALUES ('".$matchId['id']."','".$characterId['id']."')";
							$params = array();

							$stmt = sqlsrv_query( $conn, $sql, $params);

							if( $stmt === false ) {
								die( print_r( sqlsrv_errors(), true));
							}
							}

						header("Location: ".$filePathTarget."?".$fileName."=match_success");
						exit();	
					}
				}
			}
		}
	}
?>    