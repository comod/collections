<?php

declare(strict_types=1);

namespace Tests\Unit\Example;

use Comod\Ds\Collection\CollectionInterface;
use Comod\Ds\Collection\ImmutableArrayCollection;

class ImmutableAuthorCollection extends ImmutableArrayCollection implements CollectionInterface
{
    public function __construct(Author ...$values)
    {
        parent::__construct($values);
    }

    public function add(Author $value): void
    {
        parent::append($value);
    }

    public function pop(): Author
    {
        return parent::pop();
    }

    public function shift(): Author
    {
        return parent::shift();
    }

    public function getIterator(): AuthorCollectionIterator
    {
        return new AuthorCollectionIterator($this);
    }
}
