<?php

namespace Respect\Validation;

use Respect\Validation\Exceptions\ValidationException;

interface Validatable
{

    public function assert($input);

    public function check($input);

    public function createException();

    public function getException();

    public function getName();

    public function reportError($input, array $relatedExceptions=array());

    public function setException(ValidationException $e);

    public function setName($name);

    public function validate($input);
}

