<?php

namespace Phpactor\Name\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phpactor\Name\Exception\InvalidName;
use Phpactor\Name\FullyQualifiedName;
use Phpactor\Name\QualifiedName;

class FullyQualifiedNameTest extends AbstractQualifiedNameTestCase
{
    protected function createFromArray(array $parts)
    {
        return FullyQualifiedName::fromArray($parts);
    }

    protected function createFromString(string $string)
    {
        return FullyQualifiedName::fromString($string);
    }
}
