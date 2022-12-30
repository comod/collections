<?php

declare(strict_types=1);

namespace Comod\Ds\Collection;

use Comod\Ds\Exception\InvalidOperationException;

class ImmutableArrayCollection extends ArrayCollection
{
    public const INVALID_OPERATION_EXCEPTION_MESSAGE = 'Append is not allowed';

    /**
     * @throws InvalidOperationException
     */
    public function append($value): void
    {
        throw new InvalidOperationException(self::INVALID_OPERATION_EXCEPTION_MESSAGE);
    }
}
