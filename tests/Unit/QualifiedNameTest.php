<?php

namespace Phpactor\Name\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phpactor\Name\FullyQualifiedName;
use Phpactor\Name\QualifiedName;

class QualifiedNameTest extends AbstractQualifiedNameTestCase
{
    protected function createFromArray(array $parts)
    {
        return QualifiedName::fromArray($parts);
    }

    protected function createFromString(string $string): QualifiedName
    {
        return QualifiedName::fromString($string);
    }

    public function testCanBeConvertedToFullyQualifiedName()
    {
        $this->assertEquals(
            FullyQualifiedName::fromString('Foobar\\Barfoo'),
            $this->createFromString('Foobar\\Barfoo')->toFullyQualifiedName()
        );

    }
}
