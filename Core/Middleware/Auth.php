<?php

namespace Core\Middleware;

/**
 * The Auth middleware class.
 *
 * This middleware is responsible for ensuring that only authenticated users
 * can access certain routes. If a user is not authenticated, they will be
 * redirected to the home page.
 */
class Auth
{
    /**
     * Handles the request and checks for user authentication.
     *
     * If the user is not authenticated (i.e., no 'user' key in the session),
     * they are redirected to the home page (`/`).
     *
     * @return void
     */
    public function handle()
    {
        // Check if the 'user' key exists in the session.
        // If it doesn't exist or is false (e.g., null, empty array), the user is not authenticated.
        if (!($_SESSION['user'] ?? false)) {
            // Redirect the user to the home page.
            redirect('/');
        }
    }
}
