<?php

namespace Core;

class Session
{
    /**
     * Stores a value in the session with the given key.
     *
     * @param string $key The key to store the value under.
     * @param mixed $value The value to store.
     * @return void
     */
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Checks if a session key exists and has a value.
     *
     * This method checks if a key exists in the session and if it has a value
     * (i.e., it's not null or empty).
     *
     * @param string $key The key to check.
     * @return bool True if the key exists and has a value, false otherwise.
     */
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    /**
     * Retrieves a value from the session.
     *
     * This method first checks if the key exists in the '_flash' section of the
     * session. If it does, it returns the flashed value. Otherwise, it checks
     * the regular session and returns the value or the provided default.
     *
     * @param string $key The key to retrieve.
     * @param mixed $default The default value to return if the key is not found (default: null).
     * @return mixed The value associated with the key, or the default value if not found.
     */
    public static function get($key, $default = null)
    {
        // Check if the key exists in the '_flash' section.
        if (isset($_SESSION['_flash'][$key])) {
            // Return the flashed value.
            return $_SESSION['_flash'][$key];
        }
        // Return the value from the regular session or the default value.
        return $_SESSION[$key] ?? $default;
    }

    /**
     * Stores a value in the '_flash' section of the session.
     *
     * Flashed values are intended to be used once and are automatically
     * removed after they are accessed.
     *
     * @param string $key The key to store the value under.
     * @param mixed $value The value to store.
     * @return void
     */
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /**
     * Removes all flashed data from the session.
     *
     * This method is typically called after a request has been handled to
     * clean up any flashed data.
     *
     * @return void
     */
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    /**
     * Removes all data from the session.
     *
     * This method clears all session variables.
     *
     * @return void
     */
    public static function flush()
    {
        $_SESSION = [];
    }

    /**
     * Destroys the session and clears the session cookie.
     *
     * This method removes all session data, destroys the session, and clears
     * the session cookie.
     *
     * @return void
     */
    public static function destroy()
    {
        // Clear all session variables.
        static::flush();
        // Destroy the session.
        session_destroy();
        // Clear the session cookie.
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
