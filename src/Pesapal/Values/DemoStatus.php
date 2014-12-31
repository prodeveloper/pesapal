<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 10:31
 */

namespace Pesapal\Values;


class DemoStatus
{
    protected $live_link = "https://www.pesapal.com/api/PostPesapalDirectOrderV4";
    protected $demo_link = "http://demo.pesapal.com/API/PostPesapalDirectOrderV4";
    protected $demo_query_link = "http://demo.pesapal.com/api/QueryPaymentStatus";
    protected $live_query_link = "https://www.pesapal.com/API/QueryPaymentStatus";
    protected $demo_merchant_query_link = "http://demo.pesapal.com/api/QueryPaymentStatusByMerchantRef";
    protected $live_merchant_query_link = "https://www.pesapal.com/API/QueryPaymentStatusByMerchantRef";

    protected $demo_mode;

    function __construct($demo_mode)
    {
        $this->demo_mode = $demo_mode;
    }

    function getLink()
    {
        if ($this->demo_mode) {
            return $this->demo_link;
        } else {
            return $this->live_link;
        }
    }

    function getQueryLink()
    {
        if ($this->demo_mode) {
            return $this->demo_query_link;
        } else {
            return $this->live_query_link;
        }
    }

    function getQueryByRefLink()
    {
        if ($this->demo_mode) {
            return $this->demo_merchant_query_link;
        } else {
            return $this->live_merchant_query_link;
        }
    }


} 