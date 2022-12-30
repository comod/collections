<?php

declare(strict_types=1);

namespace Tests\Unit\Example;

use Comod\Ds\Collection\CollectionIterator;
use Comod\Ds\Collection\CollectionIteratorInterface;

class AuthorCollectionIterator extends CollectionIterator implements CollectionIteratorInterface
{
    public function current(): Author
    {
        return parent::current();
    }
}
