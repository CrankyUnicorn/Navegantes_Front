<div class="pc_entrance_navbar">
  
  <div class="pc_navbar_left">
    
    <a href="game_intro.php">Início</a>
    <a href="game_codex.php">Códice</a>
    <a href="game_about.php">Sobre</a>
    <a href="game_contacts.php">Contactos</a>
  </div>
  <div class="pc_navbar_right">
  
    <form action="login.php" method="POST">
					
			 <?php
						if(isset($_SESSION['u_name'])){
             echo 
             "<input type='submit' value='logout' name='logout'>";
				}else{
							
          echo
              "<input type='userEmail' name='userEmail' id='pc_email' style='width:100px'>
              <input type='userPassword' name='userPassword' id='pc_password' style='width:100px'>
              <input type='submit' value='Login' name='login'>";
				}
			?>
					 
					 
		</form>

    <?php 

      if(isset($_SESSION['u_name'])){
        
        echo "<a  href='game_match.php'>".$_SESSION['u_name']."</a>";
      }else{

        echo "<a href='game_registry.php' style='font-size: 16px; padding-top: 11px;'><u>Registo</u></a>";
      }
      
    ?>
  </div>

</div>