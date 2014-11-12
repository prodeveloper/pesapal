<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 13:57
 */

namespace Pesapal\Contracts;


interface PaymentPromise
{

    public function paid();

    public function failed();

    public function inProgress();
} 