<?php

namespace App\Rules;

use App\Models\customer\BanquetManager;
use App\Models\customer\Customer;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueEmailMultipleTables implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (Customer::where('email', $value)->exists() || BanquetManager::where('email', $value)->exists()) {
            $fail('The :attribute is already taken.');
        }
    }
}
