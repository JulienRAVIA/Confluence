<?php

use PHPUnit\Framework\TestCase;
use App\Util\Regex;

class RegexTest extends TestCase
{
    public function testIsMatchingWithContentStringOnly() 
    {
        $regex = new Regex('/^[a-zA-Z]+$/');

        $this->assertTrue($regex->isValidRegularExpression());
        $this->assertTrue($regex->isMatchingWith('zfzefzefzefzf'));
        $this->assertRegExp($regex->getPattern(), 'zfzefzefzefzf');
    }

    public function testIsNotMatchingWithContentStringOnly() 
    {
        $regex = new Regex('/^[a-zA-Z]+$/');

        $this->assertTrue($regex->isValidRegularExpression());
        $this->assertFalse($regex->isMatchingWith('123456'));
        $this->assertNotRegExp($regex->getPattern(), '123456');
    }

    public function testIsNotMatchingWithContentNumberOnly() 
    {
        $regex = new Regex('/^[0-9]+$/');

        $this->assertTrue($regex->isValidRegularExpression());
        $this->assertFalse($regex->isMatchingWith('azrfzerfez'));
        $this->assertNotRegExp($regex->getPattern(), 'ezfezfezf');
    }

    public function testIsValidEmailAddress() 
    {
        $regex = new Regex('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/');

        $this->assertTrue($regex->isValidRegularExpression());
        $this->assertTrue($regex->isMatchingWith('jrgfawkes@gmail.com'));
        $this->assertRegExp($regex->getPattern(), 'jrgfawkes@gmail.com');
    }

    public function testIsNotValidEmailAddress() 
    {
        $regex = new Regex('/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/');

        $this->assertTrue($regex->isValidRegularExpression());
        $this->assertFalse($regex->isMatchingWith('jrgfawkes@gmail'));
        $this->assertNotRegExp($regex->getPattern(), 'jrgfawkes@gmail');
    }

    public function testIsRegularExpression() 
    {
        $regex = new Regex('/^[a-zA-Z]+$/');

        $this->assertTrue($regex->isValidRegularExpression());
    }

    public function testIsNotRegularExpression() 
    {
        $regex = new Regex('/^[a-zA-Z]');

        $this->assertFalse($regex->isValidRegularExpression());
    }
}