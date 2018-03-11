<?php


namespace Nicolaskuster\MemorablePasswords;


use Illuminate\Support\Facades\Config;
use Nicolaskuster\MemorablePasswords\Exceptions\TooFewWords;

class MemorablePassword
{
    /**
     * Generate a memorable Password
     *
     * @param int|null $numberOfParts
     * @param int|null $numberOfUppercaseLetters
     * @param int|null $numberOfNumbers
     * @param array|null $words
     * @param array|null $delimiters
     * @return string
     * @throws TooFewWords
     */
    static function generate($numberOfParts = null, $numberOfUppercaseLetters = null, $numberOfNumbers = null, $words = null, $delimiters = null): string
    {

        $numberOfParts = $numberOfParts !== null ? $numberOfParts : Config::get('memorablepasswords.number_of_parts');
        $numberOfUppercaseLetters = $numberOfUppercaseLetters !== null ? $numberOfUppercaseLetters : Config::get('memorablepasswords.number_of_uppercase_letters');
        $numberOfNumbers = $numberOfNumbers !== null ? $numberOfNumbers : Config::get('memorablepasswords.number_of_numbers');
        $words = $words !== null ? $words : Config::get('memorablepasswords.words');
        $delimiters = $delimiters !== null ? $delimiters : Config::get('memorablepasswords.delimiters');

        if ($numberOfParts > count($words)) throw TooFewWords::notEnoughWords($numberOfParts, count($words));

        shuffle($words);
        shuffle($delimiters);

        $passwordParts = array_slice($words, 0, $numberOfParts);

        $passwordParts = $numberOfUppercaseLetters ? self::randomUppercase($passwordParts, $numberOfUppercaseLetters) : $passwordParts;
        $passwordParts = $numberOfNumbers ? self::randomNumbers($passwordParts, $numberOfNumbers) : $passwordParts;
        shuffle($passwordParts);

        return join(array_shift($delimiters), $passwordParts);
    }

    /**
     * Make some chars uppercase
     *
     * @param array $passwordParts
     * @param int $numberOfUppercaseLetters
     * @return array
     */
    protected static function randomUppercase(array $passwordParts, int $numberOfUppercaseLetters): array
    {
        $partsIndex = 0;
        while ($numberOfUppercaseLetters > 0) {
            $chars = str_split($passwordParts[$partsIndex]);
            $charIndex = mt_rand(0, (count($chars) - 1));

            //skip if already uppercase
            if (ctype_upper($chars[$charIndex])) continue;

            $chars[$charIndex] = mb_strtoupper($chars[$charIndex]);

            $passwordParts[$partsIndex] = join('', $chars);

            $numberOfUppercaseLetters--;
            $partsIndex++;

            //reset $partsIndex when reaches the last item
            if ($partsIndex === count($passwordParts)) $partsIndex = 0;
        }

        return $passwordParts;
    }

    /**
     * Add some numbers
     *
     * @param array $passwordParts
     * @param int $numberOfNumbers
     * @return array
     */
    protected static function randomNumbers(array $passwordParts, int $numberOfNumbers): array
    {
        $partsIndex = 0;
        while ($numberOfNumbers > 0) {

            $passwordParts[$partsIndex] = $passwordParts[$partsIndex] . rand(0, 9);

            $numberOfNumbers--;
            $partsIndex++;

            //reset $partsIndex when reaches the last item
            if ($partsIndex === count($passwordParts)) $partsIndex = 0;
        }

        return $passwordParts;
    }
}