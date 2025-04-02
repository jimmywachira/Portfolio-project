<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    /**
     * @var array An array to store validation errors.
     */
    protected $errors = [];

    /**
     * Validates the email and password inputs.
     *
     * This method checks if the provided email is a valid email address and if
     * the password meets the minimum length requirement.
     *
     * @param string $email The email address to validate.
     * @param string $password The password to validate.
     * @return bool True if the inputs are valid, false otherwise.
     */
    public function validate($email, $password)
    {
        // Validate the email address.
        if (!Validator::email($email)) {
            // If the email is invalid, add an error message to the errors array.
            $this->errors['email'] = 'provide a valid email address';
        }

        // Validate the password.
        if (!Validator::string($password, 1, 8)) {
            // If the password is too short, add an error message to the errors array.
            $this->errors['password'] = 'wrong password';
        }

        // Return true if there are no errors, false otherwise.
        return empty($this->errors);
    }

    /**
     * Returns the validation errors.
     *
     * @return array The array of validation errors.
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Adds a custom error message to the errors array.
     *
     * @param string $field The field associated with the error.
     * @param string $message The error message.
     * @return void
     */
    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}
