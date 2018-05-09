<h1>Add customer</h1>
<form method="post" action="#" >
  <div class="row">
    <div class="col-md-6 col-sm-12">
        <label for="nameCustomer">Nazwa Klienta</label>
      <input type="text" class="form-control" id="nameCustomer" placeholder="Name" name="nameCustomer">
    </div>
    <div class="col-md-6 col-sm-12">
        <label for="emailCustomer">Email</label>
      <input type="text" id="emailCustomer" class="form-control" placeholder="Email" name="emailCustomer">
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-12">
        <label for="adressCustomer">Adres Klienta</label>
      <input type="text" class="form-control" id="adressCustomer" name="adressCustomer" placeholder="Adress">
    </div>

    <div class="col-md-6 col-sm-12">
        <label for="telCustomer"></label>
        <input type="text" id="telCustomer" name="telCustomer" placeholder="Telefon" class="form-control">

    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-sm-12">
        <label for="postalCodeCus">Postal code</label>
        <input type="text" class="form-control" name="postalCoceCus" placeholder="Postal Code" id="postalCoceCusl">
    </div>
    <div class="col-md-6 col-sm-12">
        <!-- <label for="cityCustomer">City</label>
        <input type="text" name="cityCustomer" id="cityCustomer" value=""> -->

        <label for="cityCustomer">City</label>
      <input type="text" class="form-control" id="cityCustomer" name="cityCustomer" placeholder="City">
    </div>

  </div>
  <div class="form-row">
      <div class=" form-group col-12">
          <br>
          <!-- <label for="btncustomer">Wyślij</label> -->
        <button type="submit" name="button" id="btncustomer" class="btn-primary">Wyślij</button>
        <!-- <input type="text" class="form-control"> -->
      </div>
  </div>
</form>

<form action="" ></form>

<?php

$customers = new ch_customers();
$Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ((!empty($_POST["nameCustomer"])) and
        (!empty($_POST["emailCustomer"])) and
        (!empty($_POST["adressCustomer"]))and
        (!empty($_POST["telCustomer"])) and
        (!empty($_POST["postalCoceCus"])) and
        (!empty($_POST["cityCustomer"]))) {
        $customers->name = $_POST["nameCustomer"];
        $customers->email = $_POST["emailCustomer"];
        $customers->adress = $_POST["adressCustomer"];
        $customers->telCustomer = $_POST["telCustomer"];
        $customers->postalCode = $_POST["postalCoceCus"];
        $customers->cityCustomer = $_POST["cityCustomer"];
        $customers->insertCustomer();
    } else {
        echo "Wypełnij prawidłowo formularz";
    }
}



?>
