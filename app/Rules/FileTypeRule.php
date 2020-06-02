<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class FileTypeRule implements Rule
{
    protected $notAllowedExtensions;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->notAllowedExtensions = ['exe', 'bmp', 'php'];
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
        $extension = strtolower($value->extension());

        $success = true;

        if(in_array($extension, $this->notAllowedExtensions))
        {
            $success = false;
        }

        return $success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please select file except .exe, .bmp or .php.';
    }
}
