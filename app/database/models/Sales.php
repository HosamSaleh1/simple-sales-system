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
    
    public function create()
    {
        $query = "INSERT INTO `Sales` (`user_id`,`product_id`,`date_time`,`quantity`,`tax`,`tax_price`,`paid`,`charge`)
        VALUES ('$this->user_id','$this->product_id','$this->date_time','$this->quantity','$this->tax','$this->tax_price','$this->paid','$this->charge')";
        return $this->runDML($query);
    }

    public function read()
    {
        // $query = "SELECT * FROM `SalesDetails`";
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

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of date_time
     */ 
    public function getDate_time()
    {
        return $this->date_time;
    }

    /**
     * Set the value of date_time
     *
     * @return  self
     */ 
    public function setDate_time($date_time)
    {
        $this->date_time = $date_time;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get the value of tax
     */ 
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set the value of tax
     *
     * @return  self
     */ 
    public function setTax($tax)
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * Get the value of tax_price
     */ 
    public function getTax_price()
    {
        return $this->tax_price;
    }

    /**
     * Set the value of tax_price
     *
     * @return  self
     */ 
    public function setTax_price($tax_price)
    {
        $this->tax_price = $tax_price;

        return $this;
    }

    /**
     * Get the value of paid
     */ 
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Set the value of paid
     *
     * @return  self
     */ 
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * Get the value of charge
     */ 
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * Set the value of charge
     *
     * @return  self
     */ 
    public function setCharge($charge)
    {
        $this->charge = $charge;

        return $this;
    }
}
