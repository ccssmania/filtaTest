<?php

namespace App\Rules;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsProductOfTheDay implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $productId = request()->route()->parameters()['product']?->id ?? null;
        $countProductOfTheDay = Product::where('product_of_the_day', true)->where('id', '!=', $productId)->count();

        if ($countProductOfTheDay >= 5) {
            $fail('There are already 5 products of the day.');
        }
    }
}
