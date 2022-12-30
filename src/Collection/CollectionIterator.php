<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

use IteratorIterator;

abstract class CollectionIterator extends IteratorIterator
{
    public function __construct(CollectionInterface $collection)
    {
        parent::__construct(
            (static function () use ($collection): \Generator {
                yield from $collection->getArrayCopy();
            })()
        );
    }
}
