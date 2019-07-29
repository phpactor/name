<?php

namespace Phpactor\Name;

use Phpactor\Name\Exception\InvalidName;

final class QualifiedName implements Name
{
    const NAMESPACE_SEPARATOR = '\\';

    /**
     * @var array
     */
    private $parts;

    private function __construct(array $parts)
    {
        if (empty($parts)) {
            throw new InvalidName(sprintf(
                'Names must have at least one segment'
            ));
        }

        $this->parts = $parts;
    }

    public static function fromArray(array $parts): QualifiedName
    {
        return new self($parts);
    }

    public static function fromString(string $string): QualifiedName
    {
        return new self(array_filter(explode(self::NAMESPACE_SEPARATOR, $string)));
    }

    public function __toString(): string
    {
        return implode(self::NAMESPACE_SEPARATOR, $this->parts);
    }

    public function toFullyQualifiedName(): FullyQualifiedName
    {
        return FullyQualifiedName::fromQualifiedName($this);
    }

    public function head(): Name
    {
        $parts = $this->parts;
        return new self([array_pop($parts)]);
    }

    public function tail(): Name
    {
        $parts = $this->parts;
        array_pop($parts);
        return new self($parts);
    }

    public function isDescendantOf(Name $name): bool
    {
        return array_slice($this->parts, 0, $name->count()) === $name->toArray();
    }

    public function toArray(): array
    {
        return $this->parts;
    }

    public function count(): int
    {
        return count($this->parts);
    }
}
