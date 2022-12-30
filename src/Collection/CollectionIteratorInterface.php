<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

interface CollectionIteratorInterface
{
    public function __construct(CollectionInterface $collection);
    public function current(): object;
}
