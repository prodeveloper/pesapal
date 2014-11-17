<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 12/11/14
 * Time: 12:35
 */

namespace Pesapal\Services;

use BigName\EventDispatcher\Dispatcher as BigNameDispatcher;

class Dispatcher extends BigNameDispatcher
{
use SingletonMake;

}