
<!-- // INSERT INTO `services` (`ID_services`, `name_service`, `price_service`, `type_settlement`) VALUES (NULL, 'test', '2', 'Y'); -->

<h1>Customers</h1>
<?php
echo('<table class="table table-hover">');
$services = new ch_service();
$allServices = $services->getAllSevices();
    echo('<thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Type payment</th>
    </tr>
  </thead>');
foreach ($allServices as $key => $value) {
    echo"<tr>";
        echo"<td>";
        echo($allServices[$key]["name_service"]);
        echo"</td>";
        echo"<td>";
        echo($allServices[$key]["price_service"]);
        echo"</td>";
        echo"<td>";
        echo($allServices[$key]["type_settlement"]);
        echo"</td>";
    echo"</tr>";
}
echo('</table>');
// var_dump($allCustomers);