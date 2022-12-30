<?php

declare(strict_types=1);

namespace Tests\Unit\Example;

use ArrayObject;
use Comod\Ds\Collection\MapInterface;

class AuthorMap extends ArrayObject implements MapInterface
{
    public function offsetGet(mixed $key): Author
    {
        return parent::offsetGet($key);
    }
}
