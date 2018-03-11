<?php


namespace Nicolaskuster\MemorablePasswords\Tests;


use NicolasKuster\MemorablePasswords\Exceptions\TooFewWords;
use Nicolaskuster\MemorablePasswords\MemorablePassword;

class MemorablePasswordTest extends TestCase
{
    public function testNumberOfParts()
    {
        $password = MemorablePassword::generate(12, null, null, null, ['-']);
        $this->assertCount(12, explode('-', $password));
    }

    public function testNumberOfUppercaseLetters()
    {
        $password = MemorablePassword::generate(null, 5, null, null, ['-']);
        $this->assertEquals(5, strlen(preg_replace('/[^A-Z]/', '', $password)));
    }

    public function testNumberOfNumbers()
    {
        $password = MemorablePassword::generate(null, null, 7, null, ['-']);
        $this->assertEquals(7, strlen(preg_replace('/[^0-9]/', '', $password)));
    }

    public function testExceptionTooFewWords()
    {
        $this->expectException(TooFewWords::class);
        MemorablePassword::generate(200);
    }
}