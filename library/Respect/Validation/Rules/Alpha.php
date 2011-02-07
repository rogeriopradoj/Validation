<?php

namespace Respect\Validation\Rules;

use Respect\Validation\Exceptions\ComponentException;

class Alpha extends AbstractRule
{

    protected $additionalChars = '';
    protected $stringFormat = '#^([a-zA-Z]|\s)+$#';

    public function __construct($additionalChars='')
    {
        if (!is_string($additionalChars))
            throw new ComponentException(
                'Invalid list of additional characters to be loaded'
            );
        $this->additionalChars = $additionalChars;
    }

    public function assert($input)
    {
        if (!$this->validate($input))
            throw $this->reportError($input, array(), $this->additionalChars);
        return true;
    }

    public function validate($input)
    {
        return is_string($input) && preg_match(
            $this->stringFormat,
            str_replace(str_split($this->additionalChars), '', $input)
        );
    }

}