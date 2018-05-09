<?php
// include_once "Database.php";

// include_once "DB/Database.php";
// $db = new Database("erte_customerhost", "root", "", "localhost");
// $db = new Database($database_name, $username, $password, $host);

// global $db;




class ch_customers
{
    public $name;
    public $adress;
    public $cityCustomer;
    public $email;
    public $postalCode;
    public $telCustomer;
    
    public function getAllCustomer()
    {
        $db = Database::instance();
        $sql = "SELECT * FROM `customer`";
        $db->query($sql);
        return $db->result_array(); 
        // return $db->result();
        // * `$db->result_array()` returns all matches rows as an array containing row arrays
        // * `$db->row_array()` returns the first row that matches the query as an object (stdClass)
    }
    public function insertCustomer()
    {
        global $db;
        // // $sql = "INSERT INTO `customer` (`ID_customer`, `email`, `name_customer`, `adres_customer`)
        //     VALUES ( '$email', '$name', '$adress')";
        $insert = $db->insert(
            'customer',
            array(
                // 'ID_customer'=> null,
                'name_customer' =>$this->name,// $this->name,
                'adress_customer' =>$this->adress,// $this->adress,
                'city_customer' => $this->cityCustomer,
                'email_customer' => $this->email,//$this->email,
                'postal_code_cust' => $this->postalCode,
                'tel_customer' => $this->telCustomer,

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
