<?php

use App\Database\Config\CRUD\crud;
use App\Database\Config\Database\database;
use App\Requests\Validation\Validation;

include_once __DIR__.'/../config/crud.php';
include_once __DIR__.'/../config/database.php';
include_once __DIR__.'/../../Requests/Validation.php';

class User extends database implements crud
{

    use Validation;

    private $id;
    private $name_ar;
    private $name_en;
    private $tax_num;
    private $address;
    private $phone;
    private $email;

    public function create()
    {
        $query = "INSERT INTO `Users` (`name_ar`,`name_en`,`tax_num`,`address`,`phone`,`email`)
        VALUES ('$this->name_ar','$this->name_en','$this->tax_num','$this->address','$this->phone','$this->email')";
        return $this->runDML($query);
    }

    public function checkIfEmailExist()
    {
        $query = "SELECT * FROM `Users` WHERE `email` = '$this->email'";
        return $this->runDQL($query);
    }

    public function checkIfPhoneExist()
    {
        $query = "SELECT * FROM `Users` WHERE `phone` = '$this->phone'";
        return $this->runDQL($query);
    }

    public function checkIfTaxNumExist()
    {
        $query = "SELECT * FROM `Users` WHERE `tax_num` = '$this->tax_num'";
        return $this->runDQL($query);
    }

    public function read()
    {
        $query = "SELECT * FROM `Users`";
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
     * Get the value of tax_num
     */ 
    public function getTax_num()
    {
        return $this->tax_num;
    }

    /**
     * Set the value of tax_num
     *
     * @return  self
     */ 
    public function setTax_num($tax_num)
    {
        $this->tax_num = $tax_num;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
