<?php
/**
 *
 */
class erteCustomers 
{
    public $clientsToPayYearly;

    function __construct()
    {
        # code...
    }
    /**
     * gets customers to pay yearly
     */
    public function getClientsToPayYearly()
    {
        # 1 SQL get yearly customers
        $sql = "SELECT `ID_cs_start`, `id_service`, `id_customer`, `cs_o_date_start`, `cs_o_active` FROM `customer_service_start` WHERE `cs_o_active` = 0";
         
        # 2 download payment dates the customer
        # check the first payment
        # check all payments starting from the first
        #
    }

    /**
     * gets customers to pay monthly
     */
    public function getClientsToPayMonthly()
    {
        #SQL
    }


    /**
    * sets the payment on a given day
    *
    */
    public function setAsPaid($value='')
    {
        #saves the date of payment to the table history_payment

    }
    public function setToPayd($value='')
    {
        #

    }
/**
 *
 */



}
