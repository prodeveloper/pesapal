<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 01:17
 */

namespace Pesapal\Dispatcher;
use Pesapal\Services\Dispatcher;

trait Raise
{
    function raise($event)
    {
        Dispatcher::make()->dispatch($event);
    }
} 