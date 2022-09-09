<?php

namespace App\Rules;

use App\Models\Cat;
use Illuminate\Contracts\Validation\Rule;

class IsValidCatName implements Rule
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
        $items = explode(',', $value);

        foreach ($items as $item) {
            if (!in_array( $item, Cat::all()->pluck('name')->toArray())) {
                return false;
            }
        }

        return true;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Такого кота нет.';
    }
}
