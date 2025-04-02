<?php

namespace Core;

class Validator
{
    /**
     * Validates if a given value is a string within a specified length range.
     *
     * This method checks if the provided value is a string and if its length,
     * after trimming whitespace, falls within the specified minimum and maximum
     * length constraints.
     *
     * @param string $value The value to validate.
     * @param int $min The minimum allowed length (default: 1).
     * @param int $max The maximum allowed length (default: INF, infinity).
     * @return bool True if the value is a string within the length range, false otherwise.
     */
    public static function string($value, $min = 1, $max = INF)
    {
        // Trim whitespace from the beginning and end of the string.
        $value = trim($value);

        // Check if the string's length is within the specified range.
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    /**
     * Validates if a given value is a valid email address.
     *
     * This method uses the `filter_var()` function with the `FILTER_VALIDATE_EMAIL`
     * filter to determine if the provided value is a valid email address.
     *
     * @param string $value The value to validate.
     * @return bool True if the value is a valid email address, false otherwise.
     */
    public static function email(string $value): bool
    {
        // Use filter_var() to validate the email address.
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
