<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

interface CollectionInterface
{
    public function getIterator(): CollectionIteratorInterface;
}
