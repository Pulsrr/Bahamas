<div data-role="fieldcontain">
<form id="sfGuardAuth" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
  <table>
    <?php echo $form ?>
  </table>

  <input type="submit" value="sign in" />
</form>
</div>