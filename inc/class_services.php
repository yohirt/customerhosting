<?php
// include_once "Database.php";

// include_once "DB/Database.php";
// $db = new Database("erte_customerhost", "root", "", "localhost");
// $db = new Database($database_name, $username, $password, $host);
// INSERT INTO `services` (`ID_services`, `name_service`, `price_service`, `type_settlement`) VALUES (NULL, 'test', '2', 'Y');



class ch_service
{
    public $nameService;
    public $priceService;
    public $typePayment;

     public function getAllSevices()
    {
        // $db = Database::instance();

        $db = Database::instance();
        $sql = "SELECT * FROM `services`";
        $db->query($sql);
        return $db->result_array(); 
        // return $db->result();
        // * `$db->result_array()` returns all matches rows as an array containing row arrays
        // * `$db->row_array()` returns the first row that matches the query as an object (stdClass)
    }

    public function insertService()
    {
        global $db;
        // // $sql = "INSERT INTO `customer` (`ID_customer`, `email`, `name_customer`, `adres_customer`)
        //     VALUES ( '$email', '$name', '$adress')";
        $insert = $db->insert(
            'services',
            array(
                // 'ID_customer'=> null,
                'name_service' =>$this->nameService,// $this->name,
                'price_service' =>$this->priceService,// $this->adress,
                'type_settlement' => $this->typePayment,
            )
        );
        if ($insert) {
            echo"Dodano rekord <br>";
        } else {
            echo"Błąd dodania rekordu <br>";
        }
        // return $db->result;
    }
}

// $customers = new ch_customers();
// $customers->adress = "adress";
// $customers->name = "name";
// $customers->email = "email";
// $customers->insertCustomer();
