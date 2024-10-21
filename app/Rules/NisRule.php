<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NisRule implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Validasi NIS harus angka dengan panjang 10 digit
        return is_numeric($value) && strlen($value) === 9;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'NIS yang dimasukkan tidak valid. NIS harus berupa angka 10 digit.';
    }
}
