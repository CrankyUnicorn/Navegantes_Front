<?php include 'connect.php'; ?>

<?php

	$keywordOne = "character";
	$keywordTwo = "match";

	//$filePath = "../page_player.php";
	//$fileName = "view_player";
	$tableName = $keywordOne."_".$keywordTwo;
	$columnOneName = $keywordOne."_id";
	$columnTwoName = $keywordTwo."_id";

	$tableOneName = $keywordOne;
	$columnTableOneName = $keywordOne."_name"; // replace this on other folder that fit the standard
	$tableTwoName = $keywordTwo;
	$columnTableTwoName = $keywordTwo."_name";
	//there is an extra parameter 'nick_name' to be changed by hand in line 24 and 29

	$rowColorState = 0;
	$rowColor = "pc_evenColor";


	$sql = "SELECT * FROM match WHERE id IN
	(SELECT match_id FROM character_match WHERE character_id IN
	(SELECT character_id FROM player_character WHERE player_id IN 
	(SELECT id FROM player WHERE email = '".$_SESSION["u_email"]."')))";

	$params = array(1, "some data");

	$stmt = sqlsrv_query( $conn, $sql, $params);
		
	echo "<div class='pc_intro_table'><table class='pc_center pc_table'>";
	echo "<tr class=".$rowColor."><th>ID</th><th>ID Nome</th><th>Estado</th></tr>";
	
	if($stmt != false){
		while($row = sqlsrv_fetch_array($stmt)){
					
			if($rowColorState===0){
				$rowColor = "pc_oddColor";
				$rowColorState = 1;
			}else{
				$rowColor = "pc_evenColor";
				$rowColorState = 0;
			}

			echo "<tr class='".$rowColor." pc_selected_match' onclick='startMatch(".$row['id'].")'>
			<td>".$row['id']."</td>
			<td >".$row['match_name']."</td>
			<td >".$row['state']."</td>
			</tr>";
		}
	}	
	echo "</table></div>";
	
?>