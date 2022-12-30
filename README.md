# COLLECTIONS
Avoid using arrays! Arrays are very flexible, allow almost anything and can be combined in any way.

This makes them good, but also very annoying to use.

## TRUE TYPESAFE COLLECTIONS
Collections are not a native concept of PHP, as there are no generics in PHP.

For this reason we are forced to use a workaround
and if we want to achieve true type safety
we must write boilerplate classes for each collection we want to use
[More...](src/Collection/README.md)

## GENERIC COLLECTIONS
With **phpstan** generic collections can be achieved, but in fact is not really type safe
[GenericCollection](src/Collection/GenericCollection.php)
```php
use Comod\Ds\Collection\GenericCollection;
use Tests\Unit\Example\Author;
use Tests\Unit\Example\AuthorCollection;

/**
 * @phpstan-var GenericCollection<Author> $authorCollection
 */
$authorCollection = new GenericCollection(
    new Author(self::BAR),
    new Author(self::BAR)
);
// $authorCollection->append('bullshit'); // phpstan/psalm detects invalid type
$author = $authorCollection->pop();
echo $author->getName(); // autocompletion works
foreach ($authorCollection as $author) {
    echo $author->getName(); // autocompletion works as well
}
self::assertSame($authorCollection->count(), 1);
```

## PHP-DS - Data Structures for PHP 7
There is an Extension which can be used as an alternative for arrays
### extension
https://github.com/php-ds/ext-ds
### polyfill
https://github.com/php-ds/polyfill
### php.net 'collection' example
https://www.php.net/manual/en/class.ds-queue.php

### Notes
- polyfills can be used without the extension
- can be used with 8.2
- generic usage with phpstan, but polyfills are not complete phpstan-ready (annotations should look like this [src/Ds/Queue.php](src/Ds/Queue.php) see line 139)
