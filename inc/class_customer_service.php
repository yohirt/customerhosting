<!-- INSERT INTO `customer_service_start` (`id_customer`, `cs_o_date_start`, `cs_o_active`, `id_service`) VALUES ('1', '2018-01-02', '1', '1'); -->

<?php
class ch_CustomerService{
    public $idCustomer;
    public $csDatestart;
    public $csActive;
    public $idService;

    public function getAllCustServ()
    {
        // $db = Database::instance();

        $db = Database::instance();
        $sql = "SELECT * FROM `customer_service_start`";
        $db->query($sql);
        return $db->result_array();
        // return $db->result();
        // * `$db->result_array()` returns all matches rows as an array containing row arrays
        // * `$db->row_array()` returns the first row that matches the query as an object (stdClass)
    }

    public function insertCustServ()
    {
        global $db;
        // INSERT INTO `customer_service_start` (`id_customer`, `cs_o_date_start`, `cs_o_active`, `id_service`) VALUES ('1', '2018-01-02', '1', '1')
        $insert = $db->insert(
            'customer_service_start',
            array(
                // 'ID_customer'=> null,
                'id_customer' => $this->idCustomer, // $this->name,
                'id_service' => $this->idService, // $this->name,
                'cs_o_date_start' => $this->csDatestart, // $this->adress,
                'cs_o_active' => $this->csActive,
            )
        );
        if ($insert) {
            echo "Dodano rekord <br>";
        } else {
            echo "Błąd dodania rekordu <br>";
        }
        // return $db->result;
    }
}

// $customers = new ch_customers();
// $customers->adress = "adress";
// $customers->name = "name";
// $customers->email = "email";
// $customers->insertCustomer();
