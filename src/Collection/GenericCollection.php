<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

use ArrayIterator;
use ArrayObject;
use Iterator;

/**
 * GenericCollection - Generic Base Class for Collections
 *
 * @template T
 * @extends ArrayObject<int, T>
 */
class GenericCollection extends ArrayObject
{
    /**
     * @phpstan-param T ...$values
     */
    public function __construct(...$values)
    {
        parent::__construct($values);
    }

    /**
     * @phpstan-return T
     */
    public function shift()
    {
        $current = $this->getArrayCopy();
        $object = array_shift($current);
        $this->exchangeArray($current);

        return $object;
    }

    /**
     * @phpstan-return T
     */
    public function pop()
    {
        $current = $this->getArrayCopy();
        $object = array_pop($current);
        $this->exchangeArray($current);

        return $object;
    }

    /** @return ArrayIterator<int, T> */
    public function getIterator(): ArrayIterator
    {
        return parent::getIterator();
    }
}
