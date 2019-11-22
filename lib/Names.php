<?php

namespace Phpactor\Name;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class Names implements Countable, IteratorAggregate
{
    /**
     * @var array
     */
    private $names;

    private function __construct(Name ...$names)
    {
        $this->names = $names;
    }

    public static function fromArray(array $array)
    {
        return new self(...$array);
    }

    /**
     * {@inheritDoc}
     */
    public function count(): int
    {
        return count($this->names);
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->names);
    }
}
