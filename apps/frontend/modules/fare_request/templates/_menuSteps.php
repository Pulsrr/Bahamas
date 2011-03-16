<?php
$module = $sf_params->get('module');
$action = $sf_params->get('action');

if($module == "fare_request" && $action == "edit") {
    $step = 1;
}
if($module == "fare" && $action == "show" && !$sf_user->isAuthenticated()) {
    $step = 2;
}
if($module == "fare" && $action == "show" && $sf_user->isAuthenticated()) {
    $step = 3;
}

?>

<ul id="menu_second">
    <li><a href="<?php echo url_for('fare_request/edit') ?>">1. Réservation</a></li>
    <?php if($step >= 2): ?>
        <li><a href="<?php echo url_for('fare/show') ?>">2. Connexion</a></li>
    <?php else: ?>
        <li><a class="inactive" href="javascript:void();">2. Connexion</a></li>
    <?php endif; ?>
    <?php if($step >= 3): ?>
        <li><a href="<?php echo url_for('fare/show') ?>">3. Confirmation</a></li>
    <?php else: ?>
        <li><a class="inactive" href="javascript:void();">3. Confirmation</a></li>
    <?php endif; ?>
</ul>
