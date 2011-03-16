<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div data-role="fieldcontain">
<form action="<?php echo url_for('user/create') ?>" method="post">
  <table>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>

            <center>
                <input type="submit" id="valid" value="Inscription" />
            </center>
</form>
</div>