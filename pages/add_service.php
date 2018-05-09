<h1>Add Service</h1>
<form method="post" action="#">
  <div class="form-group">
    <label for="nameService">Name service</label>
    <input type="text" class="form-control" id="nameService" name="nameService" placeholder="Name service">
  </div>
  <div class="row">
      <div class="col-6">
          <div class="form-group">
            <label for="typePayment">Type payment</label>
            <select class="form-control" id="typePayment" name="typePayment">
              <option value="Y">Y - Yearly</option>
              <option value="M">M - Montly</option>
            </select>
          </div>
      </div>

      <div class="col-6">
          <div class="form-group">
            <label for="priceService">Price</label>
            <input type="text" id="priceService" name="priceService" value="" class="form-control" placeholder="Price">
          </div>
      </div>
  </div>
  <!-- ===== -->
  <fieldset class="form-group">
      <input class="btn btn-primary" type="submit" value="Submit">
  </fieldset>

</form>

<?php
// var_dump($_POST["nameService"]);
$service = new ch_service();
// $Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nameService"]) and (!empty($_POST["priceService"])) and (!empty($_POST["typePayment"]))) {
        // $Err .= "adres is required <br />";
        
        $service->nameService = $_POST['nameService'];
        $service->priceService = $_POST['priceService'];
        $service->typePayment = $_POST["typePayment"];
        $service->insertService();

    } else {
        echo("Coś poszło nie tak. Wypełnij prawidłowo formularz");
    };
}



?>
