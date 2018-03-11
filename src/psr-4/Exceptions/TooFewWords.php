<?php


namespace Nicolaskuster\MemorablePasswords\Exceptions;

use Exception;

class TooFewWords extends Exception
{
    /**
     * @param int $expectedNumberOfParts
     * @param int $numberOfWords
     * @return TooFewWords
     */
    public static function notEnoughWords($expectedNumberOfParts, $numberOfWords): self
    {
        return new self("Can not generate a password with $expectedNumberOfParts parts out of $numberOfWords words.");
    }
}