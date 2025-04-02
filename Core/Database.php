<?php

namespace Core;

use PDO;

class Database
{
    /**
     * @var PDO The PDO database connection instance.
     */
    public $connection;

    /**
     * @var \PDOStatement The PDO statement object for prepared queries.
     */
    public $statement;

    /**
     * Database constructor.
     *
     * Establishes a PDO database connection using the provided configuration.
     *
     * @param array $config The database configuration array (e.g., 'host', 'port', 'dbname').
     * @param string $username The database username (default: 'root').
     * @param string $password The database password (default: '').
     */
    public function __construct($config, $username = 'root', $password = '')
    {
        // Build the Data Source Name (DSN) string for PDO connection.
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        // Create a new PDO connection instance.
        $this->connection = new PDO($dsn, $username, $password, [
            // Set the default fetch mode to associative array.
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * Executes a database query with optional parameters.
     *
     * Prepares and executes a SQL query using PDO.
     *
     * @param string $query The SQL query string.
     * @param array $params An associative array of parameters to bind to the query (default: []).
     * @return $this Returns the current Database instance for method chaining.
     */
    public function query($query, $params = [])
    {
        // Prepare the SQL query.
        $this->statement = $this->connection->prepare($query);

        // Execute the prepared statement with the provided parameters.
        $this->statement->execute($params);

        // Return the current Database instance for method chaining.
        return $this;
    }

    /**
     * Fetches all rows from the result set.
     *
     * @return array An array of associative arrays representing the fetched rows.
     */
    public function get()
    {
        // Fetch all rows from the result set.
        return $this->statement->fetchAll();
    }

    /**
     * Fetches a single row from the result set.
     *
     * @return array|false An associative array representing the fetched row, or false if no row is found.
     */
    public function find()
    {
        // Fetch a single row from the result set.
        return $this->statement->fetch();
    }

    /**
     * Fetches a single row or aborts with a 404 error if no row is found.
     *
     * @return array An associative array representing the fetched row.
     */
    public function findOrFail()
    {
        // Attempt to find a single row.
        $result = $this->find();

        // If no row is found, abort with a 404 error.
        if (!$result) {
            abort();
        }

        // Return the found row.
        return $result;
    }
}
