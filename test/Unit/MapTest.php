<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Tests\Unit\Example\Author;
use Tests\Unit\Example\AuthorMap;

class MapTest extends TestCase
{
    public function test(): void
    {
        $authorMap = new AuthorMap(
            ['foo' => new Author('bar')]
        );
        $author = $authorMap->offsetGet('foo');

        self::assertSame($author->getName(), 'bar');
    }
}
