<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AdvanceNotGreaterThanRental implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */

    protected $rentalRate;

    public function __construct($rentalRate)
    {
        $this->rentalRate = $rentalRate;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value >= $this->rentalRate) {
            $fail('The advance amount cannot be greater than or equal the rental rate or final price.');
        }
    }
}
