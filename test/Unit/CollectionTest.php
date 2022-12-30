<?php

namespace Tests\Unit;

use Comod\Ds\Collection\GenericCollection;
use Comod\Ds\Collection\ImmutableArrayCollection;
use Comod\Ds\Exception\InvalidOperationException;
use Comod\Ds\Ds\Queue;
use Ds\Map;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Example\Author;
use Tests\Unit\Example\AuthorCollection;
use Tests\Unit\Example\ImmutableAuthorCollection;

class CollectionTest extends TestCase
{
    private const FOO = 'foo';
    private const BAR = 'bar';
    private const BAZ = 'baz';

    public function testShiftAndPop(): void
    {
        $authorCollection = new AuthorCollection(
            new Author(self::FOO),
            new Author(self::BAR)
        );
        $authorCollection->add(new Author(self::BAZ));

        self::assertInstanceOf(\Traversable::class, $authorCollection);
        foreach ($authorCollection as $author) {
            self::assertInstanceOf(Author::class, $author);
        }
        self::assertSame($authorCollection->shift()->getName(), self::FOO);
        self::assertSame($authorCollection->count(), 2);
        self::assertSame($authorCollection->pop()->getName(), self::BAZ);
    }

    public function testImmutableCollectionException(): void
    {
        $authorCollection = new ImmutableAuthorCollection(
            new Author(self::BAR)
        );
        self::assertSame($authorCollection->count(), 1);
        try {
            $authorCollection->add(new Author(self::BAZ));
        } catch (InvalidOperationException $e) {
            self::assertSame($e->getMessage(), ImmutableArrayCollection::INVALID_OPERATION_EXCEPTION_MESSAGE);
        }
    }

    public function testGenericCollectionWithAnnotations(): void
    {
        /**
         * @phpstan-var GenericCollection<Author> $authorCollection
         */
        $authorCollection = new GenericCollection(
            new Author(self::BAR),
            new Author(self::BAR)
        );
        // $authorCollection->append('bullshit'); // psalm detects invalid type
        $author = $authorCollection->pop();
        echo $author->getName(); // autocompletion works
        foreach ($authorCollection as $author) {
            echo $author->getName(); // works as well
        }
        self::assertSame($authorCollection->count(), 1);
    }

    public function testDsQueue()
    {
        /**
         * @phpstan-var Queue<Author> $queue
         */
        $queue = new Queue([
            new Author(self::BAR)
        ]);
        self::assertSame($queue->count(), 1);
        $item = $queue->peek();
        echo $item->getName(); // autocompletion works
        self::assertSame($queue->count(), 1);
        $item = $queue->pop();
        self::assertSame($queue->count(), 0);
        echo $item->getName(); // autocompletion works
        foreach ($queue as $item) {
            echo $item->getName(); // works as well
        }
    }

    public function testDsMap()
    {
        /**
         * @phpstan-var Map<string, Author> $queue
         */
        $queue = new Map([
            self::BAR => new Author(self::BAR)
        ]);
        self::assertSame($queue->count(), 1);
        $item = $queue->get(self::BAR);
        echo $item->getName(); // autocompletion works
        foreach ($queue as $item) {
            echo $item->getName(); // autocompletion do not work @todo
        }
    }
}
