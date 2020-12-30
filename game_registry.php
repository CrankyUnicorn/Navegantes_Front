<?php include 'htmldoc_start.php'; ?>

<h3 style="text-align: center;">Registo</h3>

<div class="pc_intro_map">
  <div class="pc_center">
    
    <p class="pc_intro_text">"Crie a sua conta de utilizador."</p>
    <form action="insert_player.php" method="post" class="pc_register pc_form_register">
      
      <div class="pc_form_line">
        <label for="pc_nick_name">Introduza&nbsp;a&nbsp;sua&nbsp;alcunha:&nbsp;&nbsp;</label>
        <input type="text" name='userNickName' id='pc_nick_name'>
      </div>
      
      <div class="pc_form_line">
        <label for="pc_email_registry">Introduza&nbsp;o&nbsp;seu&nbsp;email:&nbsp;&nbsp;</label>
        <input type="email" name='userEmail' id='pc_email_registry'>
      </div>
      
      <div class="pc_form_line">
        <label for="pc_password_one">Introduza&nbsp;a&nbsp;password:&nbsp;&nbsp;</label>
        <input type="password" name='userPasswordOne' id='pc_password_one'>
      </div>

      <div class="pc_form_line">
        <label for="pc_password_two">Reintroduza&nbsp;a&nbsp;password:&nbsp;&nbsp;</label>
       <input type="password" name='userPasswordTwo' id='pc_password_two'>
      </div>
      
      <br><input type='submit' value='Registar' name='register' style="float:right; margin:0; padding:5px;">
    </form>
 </div>
</div>

<?php include 'htmldoc_end.php'; ?>