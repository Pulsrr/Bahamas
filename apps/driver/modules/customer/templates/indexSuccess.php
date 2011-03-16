<h1>Clients</h1>

<h2 class="tit">Liste des clients</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Driver</th>
      <th>Name</th>
      <th>Created at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($DriverCustomers as $DriverCustomer): ?>
    <tr>
      <td><a href="<?php echo url_for('customer/show?id='.$DriverCustomer->getId()) ?>"><?php echo $DriverCustomer->getId() ?></a></td>
      <td><?php echo $DriverCustomer->getDriverId() ?></td>
      <td><?php echo $DriverCustomer->getName() ?></td>
      <td><?php echo $DriverCustomer->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('customer/new') ?>">New</a>
