<?php

declare(strict_types=1);

namespace App\Service;

final class WordCounter
{
    /**
     * @return array<string,int>
     */
    public function count(string $text): array
    {
        $words = explode(' ', preg_replace('/[^A-Za-z0-9?![:space:]]/', '', $text));

        return array_reduce($words, function (array $counts, string $word): array {
            if (trim($word) !== '') {
                $counts[$word] = isset($counts[$word]) ? ++$counts[$word] : 1;
            }

            return $counts;
        }, []);
    }
}
