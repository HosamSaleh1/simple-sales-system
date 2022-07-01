<?php

use App\Database\Config\CRUD\crud;
use App\Database\Config\Database\database;
use App\Requests\Validation\Validation;

include_once __DIR__.'/../config/crud.php';
include_once __DIR__.'/../config/database.php';
include_once __DIR__.'/../../Requests/Validation.php';

class Product extends database implements crud
{
    use Validation;

    private $id;
    private $name_ar;
    private $name_en;
    private $desc_ar;
    private $desc_en;
    private $price;
    private $barcode;

    public function create()
    {
        $query = "INSERT INTO `Products` (`name_ar`,`name_en`,`desc_ar`,`desc_en`,`price`,`barcode`)
        VALUES ('$this->name_ar','$this->name_en','$this->desc_ar','$this->desc_en',$this->price,$this->barcode)";
        return $this->runDML($query);
    }

    public function checkIfBarcodeExist()
    {
        $query = "SELECT * FROM `Products` WHERE `barcode` = '$this->barcode'";
        return $this->runDQL($query);
    }

    public function read()
    {
        $query = "SELECT * FROM `Products`";
        return $this->runDQL($query);
    }

    public function productDetails($id)
    {
        $query = "SELECT * FROM `Products` WHERE `id` = $id";
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
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name_ar
     */ 
    public function getName_ar()
    {
        return $this->name_ar;
    }

    /**
     * Set the value of name_ar
     *
     * @return  self
     */ 
    public function setName_ar($name_ar)
    {
        $this->name_ar = $name_ar;

        return $this;
    }

    /**
     * Get the value of name_en
     */ 
    public function getName_en()
    {
        return $this->name_en;
    }

    /**
     * Set the value of name_en
     *
     * @return  self
     */ 
    public function setName_en($name_en)
    {
        $this->name_en = $name_en;

        return $this;
    }

    /**
     * Get the value of desc_ar
     */ 
    public function getDesc_ar()
    {
        return $this->desc_ar;
    }

    /**
     * Set the value of desc_ar
     *
     * @return  self
     */ 
    public function setDesc_ar($desc_ar)
    {
        $this->desc_ar = $desc_ar;

        return $this;
    }

    /**
     * Get the value of desc_en
     */ 
    public function getDesc_en()
    {
        return $this->desc_en;
    }

    /**
     * Set the value of desc_en
     *
     * @return  self
     */ 
    public function setDesc_en($desc_en)
    {
        $this->desc_en = $desc_en;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of barcode
     */ 
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set the value of barcode
     *
     * @return  self
     */ 
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }
}
