<?php

namespace Phpactor\Name\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phpactor\Name\Names;
use Phpactor\Name\QualifiedName;

class NamesTest extends TestCase
{
    public function testCreateFromArray()
    {
        $names = Names::fromNames([
            QualifiedName::fromString('Hello'),
            QualifiedName::fromString('Goodbye')
        ]);

        self::assertCount(2, $names);
    }

    public function testCanIterate()
    {
        $names = Names::fromNames([
            QualifiedName::fromString('Hello'),
            QualifiedName::fromString('Goodbye')
        ]);
        self::assertIsIterable($names);
    }
}
