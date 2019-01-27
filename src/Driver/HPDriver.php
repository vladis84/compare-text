<?php

namespace Driver;

class HPDriver implements CompareDriverInterface
{
    /**
     * @inheritdoc
     */
    public function compare(string $first, string $second): float
    {
        $pairs1 = self::wordLetterPairs(mb_strtolower($first));
        $pairs2 = self::wordLetterPairs(mb_strtolower($second));


        $union = count($pairs1) + count($pairs2);

        $intersection = count(array_intersect($pairs1, $pairs2));

        $percent = (2.0 * $intersection / $union) * 100;

        return $percent;
    }

    /**
     * @inheritdoc
     */
    public function getDriverName(): string
    {
        return 'HP';
    }

    /**
     *
     * @param string $str
     * @return mixed
     */
    private static function wordLetterPairs (string $str)
    {
        $allPairs = [];

        // Tokenize the string and put the tokens/words into an array

        $words = explode(' ', $str);

        // For each word
        for ($w = 0; $w < count($words); $w ++) {
            // Find the pairs of characters
            $pairsInWord = self::letterPairs($words[$w]);

            for ($p = 0; $p < count($pairsInWord); $p ++) {
                $allPairs[$pairsInWord[$p]] = $pairsInWord[$p];
            }
        }

        return array_values($allPairs);
    }

    /**
     *
     * @param string $str
     * @return array
     */
    private static function letterPairs (string $str)
    {
        $numPairs = mb_strlen($str) - 1;
        $pairs = [];

        for ($i = 0; $i < $numPairs; $i ++) {
            $pairs[$i] = mb_substr($str, $i, 2);
        }

        return $pairs;
    }
}
