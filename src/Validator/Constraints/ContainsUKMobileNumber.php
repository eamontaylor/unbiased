<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsUKMobileNumber extends Constraint
{
    public $message = 'Enter a UK mobile in the following format: 07222 555555 or (07222) 555555 or +44 7222 555 555';
}