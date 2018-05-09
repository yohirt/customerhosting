
<h1>Customers</h1>
<?php
echo('<table class="table table-hover">');
$customers = new ch_customers();
$allCustomers = $customers->getAllCustomer();
    echo('<thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Adress</th>
      <th scope="col">Email</th>
      <th scope="col">City</th>
      <th scope="col">Postal code</th>
      <th scope="col">Mobile phone</th>
    </tr>
  </thead>');
foreach ($allCustomers as $key => $value) {
    echo"<tr>";
        echo"<td>";
        echo($allCustomers[$key]["name_customer"]);
        echo"</td>";
        echo"<td>";
        echo($allCustomers[$key]["adress_customer"]);
        echo"</td>";
        echo"<td>";
        echo($allCustomers[$key]["email_customer"]);
        echo"</td>";
        echo"<td>";
        echo($allCustomers[$key]["city_customer"]);
        echo"</td>";
        echo"<td>";
        echo($allCustomers[$key]["postal_code_cust"]);
        echo"</td>";
        echo"<td>";
        echo($allCustomers[$key]["tel_customer"]);
        echo"</td>";
    echo"</tr>";
}
echo('</table>');
// var_dump($allCustomers);