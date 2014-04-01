<?php

if ( ! function_exists('isValidEmail'))
{
    /**
     * Is valid given email addresses.
     *
     * @param  string  $value
     * @return bool
     */
    function isValidEmail($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}