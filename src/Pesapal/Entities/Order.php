<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 15:51
 */

namespace Pesapal\Entities;
class Order
{
    public $reference; //Must be unique
    public $firstname;
    public $lastname;
    public $email;
    public $type;
    public $desc;
    public $amount;
    public $phonenumber;

    function __construct($amount, $desc, $email, $firstname, $lastname, $phonenumber, $reference, $type)
    {
        $this->amount = $amount;
        $this->desc = $desc;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phonenumber = $phonenumber;
        $this->reference = $reference;
        $this->type = $type;
    }


} 