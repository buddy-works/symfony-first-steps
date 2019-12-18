<?php

declare(strict_types=1);

namespace App\Tests\Unit\Service;

use App\Service\WordCounter;
use PHPUnit\Framework\TestCase;

final class WordCounterTest extends TestCase
{
    /**
     * @dataProvider textDataProvider
     */
    public function testWordCounter(string $text, array $result): void
    {
        self::assertEquals($result, (new WordCounter())->count($text));
    }

    public function textDataProvider(): \Generator
    {
        yield 'basic text' => ['Lorem ipsum dolor sit amet, ipsum dolor sit.', [
            'Lorem' => 1,
            'ipsum' => 2,
            'dolor' => 2,
            'sit' => 2,
            'amet' => 1,
        ]];
        yield 'leetspeak text' => ['l0r3m 1p5um d0l0r 517 4m37, 1p5um d0l0r 517.', [
            'l0r3m' => 1,
            '1p5um' => 2,
            'd0l0r' => 2,
            '517' => 2,
            '4m37' => 1,
        ]];
        yield 'ignore spaces' => ['Some       text     with     tabs and    spaces', [
            'Some' => 1,
            'text' => 1,
            'with' => 1,
            'tabs' => 1,
            'and' => 1,
            'spaces' => 1,
        ]];
    }
}
