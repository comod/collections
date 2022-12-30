
### Examples
Assume *Author* as given Object
```php
// Author.php
class Author {
    public function __construct(private readonly string $name) {
    }

    public function getName(): string {
        return $this->name;
    }
}
```

Collection
```php
// AuthorCollection.php
use Comod\Collections\Collection\ArrayCollection;
use Comod\Collections\Collection\CollectionInterface;

class AuthorCollection extends ArrayCollection implements CollectionInterface
{
    public function __construct(Author ...$values)
    {
        parent::__construct($values);
    }

    public function add(Author $value): void {
        parent::append($value);
    }

    public function pop(): Author {
        return parent::pop();
    }

    public function shift(): Author {
        return parent::shift();
    }

    public function getIterator(): AuthorCollectionIterator {
        return new AuthorCollectionIterator($this);
    }
}
```

CollectionIterator
```php
// AuthorCollectionIterator.php
use Comod\Collections\Collection\CollectionIterator;
use Comod\Collections\Collection\CollectionIteratorInterface;

class AuthorCollectionIterator extends CollectionIterator implements CollectionIteratorInterface
{
    public function current(): Author
    {
        return parent::current();
    }
}
```

Initialization
```php
$authorCollection = new AuthorCollection(
    new Author(self::FOO),
    new Author(self::BAR)
);
$authorCollection->add(new Author(self::BAZ));
```

Usage
```php
$author = $authorCollection->shift()
$author = $authorCollection->pop()
$author = $authorCollection->count()

foreach ($authorCollection as $author) {
    echo $author->getName();
}
```
Autocomplete is always present

### Immutable Collections
If you know that you do not want your collection to be modified at runtime, you can use *ImmutableArrayCollection*
```php
extends ImmutableArrayCollection
```

## Map
A map is a key-value collection where the value is or should be an object.

```php
// AuthorMap.php
use ArrayObject;
use Comod\Collections\Collection\MapInterface;

class AuthorMap extends ArrayObject implements MapInterface
{
    public function offsetGet(mixed $key): Author {
        return parent::offsetGet($key);
    }
}
```

Usage
```php
$authorMap = new AuthorMap(
    ['foo' => new Author('bar')]
);
$author = $authorMap->offsetGet('foo');
```
