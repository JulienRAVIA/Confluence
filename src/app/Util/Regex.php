<?php

namespace App\Util;

class Regex
{
    /** @var $pattern */
    private $pattern;

    /**
     * Regex constructor.
     * @param string $pattern
     */
    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @param string $string
     * @return bool
     */
    public function isMatchingWith(string $string): bool
    {
        return (@preg_match($this->pattern, $string) > 0);
    }

    /**
     * @return bool
     */
    public function isValidRegularExpression(): bool
    {
        return @preg_match($this->pattern, '') !== FALSE;
    }

    /**
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }
}
