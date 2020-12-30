<?php include 'htmldoc_start.php'; ?>

<h3 style="text-align: center;">Partidas</h3>

<div class="pc_intro_map">
  
  <p class="pc_intro_text">"Lista de partidas escolha a sua partida"</p>
  
  <?php include "view_player_match.php"; ?>

  <form action="game_match_creation.php" method="post" class="pc_match pc_form_match" style="width: 600px;">
      
      <input type='submit' value='Nova Partida' name='newMatch' style="float:right; margin:0; padding:5px;">
    
    </form>

</div>

<?php include 'htmldoc_end.php'; ?>