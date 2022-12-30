<?php

declare(strict_types=1);

namespace Tests\Unit\Example;

class Author
{
    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
