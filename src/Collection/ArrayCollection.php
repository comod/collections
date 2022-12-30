<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

class ArrayCollection extends \ArrayObject
{
    public function shift(): object
    {
        $current = $this->getArrayCopy();
        $object  = array_shift($current);
        $this->exchangeArray($current);

        return $object;
    }

    public function pop(): object
    {
        $current = $this->getArrayCopy();
        $object  = array_pop($current);
        $this->exchangeArray($current);

        return $object;
    }
}
