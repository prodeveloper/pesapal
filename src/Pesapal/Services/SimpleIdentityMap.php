<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/11/14
 * Time: 00:41
 */

namespace Pesapal\Services;


use LiteCQRS\Bus\IdentityMap\IdentityMapInterface;
use LiteCQRS\EventProviderInterface;

class SimpleIdentityMap implements IdentityMapInterface {

    public function add(EventProviderInterface $object)
    {
        // TODO: Implement add() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function getAggregateId(EventProviderInterface $object)
    {
        // TODO: Implement getAggregateId() method.
    }
}