<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsFlightCode extends Constraint
{
    public $message = 'Please check the flight number "{{ string }}" has been entered correctly.';
}