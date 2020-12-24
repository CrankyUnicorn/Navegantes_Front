<?php include 'htmldoc_start.php'; ?>

<h3 style="text-align: center;">Registo</h3>

<div class="pc_intro_map">
  <div class="pc_center">
    <p class="pc_intro_text">"Crie a sua conta de utilizador."</p>
    <form action="insert_player.php" method="post" class="pc_register pc_form_register">
      <div style="display: table; width:100%; margin-bottom:5px;">
        <lable for="pc_nick_name" style="display:table-cell; width:1px">Introduza&nbsp;a&nbsp;sua&nbsp;alcunha:&nbsp;&nbsp;</lable>
        <input type="text" name='userNickName' id='pc_nick_name' style='display:table-cell; width:100%'>
      </div>
      <div style="display: table; width:100%; margin-bottom:5px;">
        <lable for="pc_email_registry" style="display:table-cell; width:1px">Introduza&nbsp;o&nbsp;seu&nbsp;email:&nbsp;&nbsp;</lable>
        <input type="email" name='userEmail' id='pc_email_registry' style='display:table-cell; width:100%'>
      </div>
      <div style="display: table; width:100%; margin-bottom:5px;">
        <lable for="pc_password_one" style="display:table-cell; width:1px">Introduza&nbsp;a&nbsp;password:&nbsp;&nbsp;</lable>
        <input type="password" name='userPasswordOne' id='pc_password_one' style='display:table-cell; width:100%'>
      </div>
      <div style="display: table; width:100%; margin-bottom:5px;">
        <lable for="pc_password_two" style="display:table-cell; width:1px">Reintroduza&nbsp;a&nbsp;password:&nbsp;&nbsp;</lable>
       <input type="password" name='userPasswordTwo' id='pc_password_two' style='display:table-cell; width:100%'>
      </div>
      <div style="display: table; width:100%">
      <br><input type='submit' value='register' name='register' style="float:right; margin:0; padding:5px;">
    </form>
 </div>
</div>

<?php include 'htmldoc_end.php'; ?>