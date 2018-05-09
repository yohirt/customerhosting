<!-- Powiązanie miedzy customerami a serisami -->

<h1>Connect customer - Service</h1>
<form action="#" method="post">
    <div class="row">


        <div class="col-md-4">
            <?php
$customers = new ch_customers();
$allCustomers = $customers->getAllCustomer();

echo ('<div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="selectCustomer">');
foreach ($allCustomers as $key => $value) {
    echo '<option value="' . $allCustomers[$key]["ID_customer"] . '">';
    echo $allCustomers[$key]["name_customer"];
    echo '</option>';
}
echo ('
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
            </div>
            ');
?>
        </div>
        <!-- //==========Show services list========== -->

        <div class="col-md-4">
            <?php
$services = new ch_service();
$servicesList = $services->getAllSevices();
echo ('<div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect02" name="selectService">');
foreach ($servicesList as $key => $value) {
    echo '<option value="' . $servicesList[$key]["ID_services"] . '">';
    echo $servicesList[$key]["name_service"];
    echo '</option>';
}
echo ('
            </select>
            <div class="input-group-append">
            <label class="input-group-text" for="inputGroupSelect02">Options</label>
            </div>
            </div>
            ');
?>
        </div>
            
            <div class="col-md-4">
                <input name="dateStartService" class="form-control" type="text" id="datepicker">

            </div>
        
        <!-- // var_dump($allCustomers); -->
    </div>
    <input   class="btn btn-primary" type="submit" value="Połącz i wyślij">
</form>
<?php

$CustServ = new ch_CustomerService();
// $Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["selectService"]) and (!empty($_POST["selectCustomer"])) and (!empty($_POST["dateStartService"]))) {
        // $Err .= "adres is required <br />";

        $CustServ->idService = $_POST['selectService'];
        $CustServ->idCustomer = $_POST['selectCustomer'];
        $CustServ->csDatestart = $_POST["dateStartService"];
        $CustServ->csActive = '1';
        $CustServ->insertCustServ();

    } else {
        echo ("Coś poszło nie tak. Wypełnij prawidłowo formularz");
    }
    ;
}
?>