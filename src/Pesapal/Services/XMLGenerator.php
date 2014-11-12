<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 10/11/14
 * Time: 16:55
 */

namespace Pesapal\Services;


use Pesapal\Order;

class XMLGenerator
{
    function getXMLFromOrder(Order $order)
    {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"" . $order->amount . "\" Description=\"" . $order->desc . "\" Type=\"" . $order->type . "\" Reference=\"" . $order->reference . "\" FirstName=\"" . $order->firstname . "\" LastName=\"" . $order->lastname . "\" Email=\"" . $order->email . "\" PhoneNumber=\"" . $order->phonenumber . "\" xmlns=\"http://www.pesapal.com\" />";
    }
} 