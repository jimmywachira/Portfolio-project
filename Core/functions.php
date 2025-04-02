<?php

use Core\Response;

/**
 * Dumps the given value and terminates the script (for debugging).
 *
 * This function is a helper for debugging. It outputs the given value in a
 * human-readable format using `var_dump()` and then terminates the script.
 *
 * @param mixed $value The value to dump.
 * @return void
 */
function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    #die(); // Commented out, so the script doesn't always terminate.
}

/**
 * Checks if the current URL matches the given value.
 *
 * This function compares the current request URI with the provided value and
 * returns true if they match, false otherwise.
 *
 * @param string $value The URL to compare against.
 * @return bool True if the current URL matches the given value, false otherwise.
 */
function urlIs($value)
{
    return $_SERVER["REQUEST_URI"] === $value;
}

/**
 * Redirects the user to the given path.
 *
 * This function sends a Location header to redirect the user to the specified
 * path and then terminates the script.
 *
 * @param string $path The path to redirect to.
 * @return void
 */
function redirect($path)
{
    header("location: {$path}");
    exit();
}

/**
 * Authorizes an action based on a condition.
 *
 * If the condition is false, this function aborts the script with the given
 * HTTP status code (default: 403 Forbidden).
 *
 * @param bool $condition The condition to check.
 * @param int $status The HTTP status code to use if the condition is false (default: Response::FORBIDDEN).
 * @return void
 */
function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

/**
 * Returns the full path to a file within the base directory.
 *
 * This function takes a relative path and prepends the base path of the
 * application to it, returning the full file path.
 *
 * @param string $path The relative path to the file.
 * @return string The full file path.
 */
function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * Aborts the script with the given HTTP status code.
 *
 * This function sets the HTTP response code to the given value, includes the
 * corresponding view file (e.g., "404.php"), and then terminates the script.
 *
 * @param int $code The HTTP status code (default: 404 Not Found).
 * @return void
 */
function abort($code = 404)
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

/**
 * Includes a view file with the given attributes.
 *
 * This function extracts the given attributes into variables and then includes
 * the specified view file.
 *
 * @param string $path The path to the view file.
 * @param array $attributes An associative array of attributes to pass to the view (default: []).
 * @return void
 */
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('views/') . $path;
}

/**
 * Logs out the current user.
 *
 * This function clears the session data, destroys the session, and clears the
 * session cookie.
 *
 * @return void
 */
function logout()
{
    $_SESSION = [];

    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}

/**
 * Logs in a user by storing their email in the session.
 *
 * This function stores the user's email in the session under the 'user' key.
 *
 * @param array $user An associative array containing the user's information (at least 'email').
 * @return void
 */
function login($user)
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
}