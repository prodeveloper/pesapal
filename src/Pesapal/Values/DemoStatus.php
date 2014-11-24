<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 10:31
 */

namespace Pesapal\Values;


class DemoStatus {
    protected $live_link="https://www.pesapal.com/api/PostPesapalDirectOrderV4";
    protected $demo_link="http://demo.pesapal.com/API/PostPesapalDirectOrderV4";
    protected $demo_mode;

    function __construct($demo_mode)
    {
        $this->demo_mode = $demo_mode;
    }

    function getLink(){
        if($this->demo_mode){
            return $this->demo_link;
        }
        else{
            return $this->live_link;
        }
    }


} 