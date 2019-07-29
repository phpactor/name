<?php

namespace Phpactor\Name\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Phpactor\Name\Exception\InvalidName;
use Phpactor\Name\QualifiedName;

abstract class AbstractQualifiedNameTestCase extends TestCase
{
    /**
     * @dataProvider provideCreateFromArray
     */
    public function testCreateFromArray(array $parts, string $expected)
    {
        $this->assertEquals($expected, $this->createFromArray($parts));
    }

    public function provideCreateFromArray()
    {
        yield [
            ['Hello'],
            'Hello'
        ];

        yield [
            ['Hello', 'Goodbye'],
            'Hello\\Goodbye'
        ];
    }

    /**
     * @dataProvider provideCreateFromString
     */
    public function testCreateFromString(string $string, string $expected)
    {
        $this->assertEquals($expected, $this->createFromString($string));
    }

    public function provideCreateFromString()
    {
        yield [
            '\\Hello',
            'Hello'
        ];

        yield [
            'Hello\\',
            'Hello'
        ];

        yield [
            'Hello',
            'Hello'
        ];

        yield [
            'Hello\\Goodbye',
            'Hello\\Goodbye'
        ];
    }

    public function testThrowsExceptionIfNameIsEmpty()
    {
        $this->expectException(InvalidName::class);
        QualifiedName::fromString('');
    }

    public function testHead()
    {
        $original = $this->createFromArray([
            'Foobar',
            'Barfoo'
        ]);
        $this->assertEquals(
            'Barfoo',
            $original->head()->__toString()
        );;
        $this->assertEquals('Foobar\\Barfoo', $original->__toString());
    }

    public function testTail()
    {
        $original = $this->createFromArray([
            'Foobar',
            'Barbar',
            'Barfoo'
        ]);
        $this->assertEquals(
            'Foobar\\Barbar',
            $original->tail()->__toString()
        );;
        $this->assertEquals('Foobar\\Barbar\\Barfoo', $original->__toString());
    }

    protected function createFromArray(array $parts)
    {
        return QualifiedName::fromArray($parts);
    }

    protected function createFromString(string $string)
    {
        return QualifiedName::fromString($string);
    }
}
