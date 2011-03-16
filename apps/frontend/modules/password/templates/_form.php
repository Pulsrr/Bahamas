<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('password/create')?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
<center>
    <input type="submit" id="valid" value="Valider" />
</center>

</form>
