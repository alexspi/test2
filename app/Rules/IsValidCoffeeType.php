<?php

namespace App\Rules;

use App\Models\Coffee;
use Illuminate\Contracts\Validation\Rule;


class IsValidCoffeeType implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $type = Coffee::all()->pluck('type_name')->toArray();

        return in_array($value, array_unique($type));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Такого типа кофе нет.';
    }
}
