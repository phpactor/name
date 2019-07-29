<?php

namespace Phpactor\Name;

use Phpactor\Name\Exception\InvalidName;
use Phpactor\Name\FullyQualifiedName;

final class FullyQualifiedName implements Name
{
    /**
     * @var QualifiedName
     */
    private $qualifiedName;

    private function __construct(QualifiedName $qualifiedName)
    {
        $this->qualifiedName = $qualifiedName;
    }

    public static function fromArray(array $parts): FullyQualifiedName
    {
        return new self(QualifiedName::fromArray($parts));
    }

    public static function fromString(string $string): FullyQualifiedName
    {
        return new self(QualifiedName::fromString($string));
    }

    public static function fromQualifiedName(QualifiedName $qualfifiedName): FullyQualifiedName
    {
        return new self($qualfifiedName);
    }

    public function __toString(): string
    {
        return $this->qualifiedName->__toString();
    }

    public function head(): Name
    {
        return $this->qualifiedName->head();
    }

    public function tail(): Name
    {
        return $this->qualifiedName->tail();
    }

    public function isDescendantOf(Name $name): bool
    {
        return $this->qualifiedName->isDescendantOf($name);
    }

    public function toArray(): array
    {
        return $this->qualifiedName->toArray();
    }

    public function count(): int
    {
        return $this->qualifiedName->count();
    }

    public function prepend(Name $name): Name
    {
        return $this->qualifiedName->prepend($name);
    }

    public function append(Name $name): Name
    {
        return $this->qualifiedName->append($name);
    }
}
