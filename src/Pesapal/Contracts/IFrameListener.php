<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 00:13
 */

namespace Pesapal\Contracts;

use Pesapal\Requests\RequestProcessed;

interface IFrameListener
{
    function show($iframe);
} 