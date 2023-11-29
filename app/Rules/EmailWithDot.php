<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EmailWithDot implements Rule
{
    public function passes($attribute, $value)
    {
        return strpos($value, '.') !== false && strpos($value, '@') !== false;
    }

    public function message()
    {
        return 'The email field must be a valid email address.';
    }
}