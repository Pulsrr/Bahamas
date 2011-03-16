<h1>Courses</h1>

<h2 class="tit">Courses à venir</h2>
<?php include_partial('list', array('Fares' => $IncomingFares)) ?>

<h2 class="tit">Courses en attente</h2>
<?php include_partial('list', array('Fares' => $PendingFares)) ?>

<h2 class="tit">Courses effectuées</h2>
<?php include_partial('list', array('Fares' => $DoneFares)) ?>