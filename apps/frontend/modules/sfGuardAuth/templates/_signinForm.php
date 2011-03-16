<div data-role="fieldcontain">
<form id="sfGuardAuth" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <?php echo $form ?>
  </table>

  <center>
    <input type="submit" id="valid" value="Connexion" />
  </center>
</form>
    <br/>
</div>