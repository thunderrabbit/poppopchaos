<?php
/*
A repository is responsible for the data access logic, communication with a database.

There are two types of repositories: collection-oriented and persistence-oriented repositories.
In this case, we are talking about persistence-oriented repositories,
since these are better suited for processing large amounts of data.

A repository is the source of all the data your application needs and mediates
between the service and the database. A repository improves code maintainability,
testing and readability by separating business logic from data access logic and
provides centrally managed and consistent access rules for a data source.
Each public repository method represents a query. The return values represent
the result set of a query and can be primitive/object or list (array) of them.
Database transactions must be handled on a higher level (service) and not within a repository.

The following Repository class uses the Data Mapper pattern.
https://designpatternsphp.readthedocs.io/en/latest/Structural/DataMapper/README.html
A Data Mapper, is a Data Access Layer that performs bidirectional transfer of
data between a persistent data store (often a relational database) and an in
memory data representation (the domain layer). The goal of the pattern is to
keep the in memory representation and the persistent data store independent of
each other and the data mapper itself.

Generic mappers will handle many different domain entity types,
dedicated mappers will handle one or a few.

The key point of this pattern is, unlike Active Record pattern, the data model
follows Single Responsibility Principle.
*/

namespace App\Domain\User\Repository;

use PDO;

/**
 * Repository.
 */
final class UserCreatorRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Insert user row.
     *
     * @param array $user The user
     *
     * @return int The new ID
     */
    public function insertUser(array $user): int
    {
        $row = [
            'username' => $user['username'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
        ];

        $sql = "INSERT INTO users SET
                username=:username,
                first_name=:first_name,
                last_name=:last_name,
                email=:email;";

        $this->connection->prepare($sql)->execute($row);

        return (int)$this->connection->lastInsertId();
    }
}
