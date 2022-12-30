<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

interface MapInterface
{
    public function offsetGet(mixed $key): object;
}
