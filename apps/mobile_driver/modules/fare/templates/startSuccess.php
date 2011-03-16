

        <h2>Vous venez de prendre en charge la course #<?php echo $Fare->getId() ?></h2>

<p style="background:#ffffff;padding:5px;border:1px solid #aaaaaa;">
    Lorsque vous aurez fini, cliquez sur le bouton ci-dessous, puis cliquez sur "Terminer la course".
</p>

<p>
    <a href="<?php echo url_for('fare/end?id='.$Fare->getId()) ?>" data-role="button">Course terminée ?</a>
</p>


