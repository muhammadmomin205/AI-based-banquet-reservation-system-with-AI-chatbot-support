<?php

namespace App\Rules;

use Closure;
use App\Models\customer\Customer;
use App\Models\customer\BanquetManager;
use Illuminate\Contracts\Validation\ValidationRule;

class EmailNotFoundMultipleTable implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Customer::where('email', $value)->exists() && !BanquetManager::where('email', $value)->exists()) {
            $fail('This :attribute is not found.');
        }
    }
}
