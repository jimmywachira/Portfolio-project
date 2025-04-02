<?php

namespace Core\Middleware;

/**
 * The Guest middleware class.
 *
 * This middleware is responsible for ensuring that only unauthenticated (guest)
 * users can access certain routes, such as the login and registration pages.
 * If a user is already authenticated, they will be redirected to the notes page.
 */
class Guest
{
    /**
     * Handles the request and checks if the user is a guest.
     *
     * If the user is authenticated (i.e., the 'user' key exists in the session),
     * they are redirected to the notes page (`/notes`).
     *
     * @return void
     */
    public function handle()
    {
        // Check if the 'user' key exists in the session.
        // If it exists and is not false (e.g., null, empty array), the user is authenticated.
        if ($_SESSION['user'] ?? false) {
            // Redirect the user to the notes page.
            redirect('/notes');
        }
    }
}
