<?php

namespace App\Util;

class Regex
{
    /** 
     * @var $pattern 
     */
    private $pattern;

    const PATTERN_EMAIL = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

    const PATTERN_TEXT = '/^[a-zA-Z]+$/';

    const PATTERN_NUMBER = '/^[0-9]+$/';

    /**
     * @param string $pattern
     */
    public function __construct($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Vérifie si le texte renseigné en paramètre match avec le pattern
     * 
     * @param string $string
     * @return bool
     */
    public function isMatchingWith(string $string): bool
    {
        return (@preg_match($this->pattern, $string) > 0);
    }

    /**
     * Vérifie si le pattern renseigné est valide et est une expression régulière
     * 
     * @return bool
     */
    public function isValidRegularExpression(): bool
    {
        return @preg_match($this->pattern, '') !== FALSE;
    }

    /**
     * Retourne le pattern
     * 
     * @return string
     */
    public function getPattern(): string
    {
        return $this->pattern;
    }
}
