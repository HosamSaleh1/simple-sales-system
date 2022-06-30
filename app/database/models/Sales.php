<?php

use App\Database\Config\CRUD\crud;
use App\Database\Config\Database\database;
use App\Requests\Validation\Validation;

include_once __DIR__.'/../config/crud.php';
include_once __DIR__.'/../config/database.php';
include_once __DIR__.'/../../Requests/Validation.php';

class Sales extends database implements crud
{
    use Validation;

    private $user_id;
    private $product_id;
    private $date_time;
    private $quantity;
    private $tax;
    private $tax_price;
    private $paid;
    private $charge;

    public function __construct($user_id,$product_id,$date_time,$quantity,$tax,$tax_price,$paid,$charge) {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->date_time = $date_time;
        $this->quantity = $quantity;
        $this->tax = $tax;
        $this->tax_price = $tax_price;
        $this->paid = $paid;
        $this->charge = $charge;
    }
    
    public function create()
    {
        $query = "INSERT INTO `Sales` (`user_id`,`product_id`,`date_time`,`quantity`,`tax`,`tax_price`,`paid`,`charge`)
        VALUES ($this->user_id,$this->product_id,$this->date_time,$this->quantity,$this->tax,$this->tax_price,$this->paid,$this->charge)";
        return $this->runDML($query);
    }

    public function read()
    {
        $query = "SELECT * FROM `SalesDetails`";
        return $this->runDQL($query);
    }

    public function update()
    {
        # code...
    }

    public function delete()
    {
        # code...
    }
}
