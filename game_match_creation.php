<?php include 'htmldoc_start.php'; ?>

<h3 style="text-align: center;">Criar Partida</h3>

<div class="pc_intro_map">
  
  <div class="pc_center">
    
    <p class="pc_intro_text">"Crie a sua partida e personagem"</p>
    <br>
    
    <form action="insert_match.php" method="post" class="pc_match pc_form_match">
      
      <div class="pc_form_line">
        <label for="pc_match_name">Nome&nbsp;da&nbsp;partida:&nbsp;</label>
        <input type="text" name='matchName' id='pc_match_name' >
      </div>

      <div class="pc_form_line">
        <label for="pc_character_name">Nome&nbsp;da&nbsp;personagem:&nbsp;</label>
        <input type="text" name='characterName' id='pc_character_name' >
      </div>
      
      <br>
      <input type='submit' value='Criar' name='createMatch' style="float:right; margin:0; padding:5px;">
    
    </form>

</div>

<?php include 'htmldoc_end.php'; ?>