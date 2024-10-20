<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    public PDO $connection;
    protected PDOStatement|false $statement;

    public function __construct(array $config = [], string $username = '', string $password = '')
    {
        // Connect to the MySQL database.
        $dsn = 'mysql:'.http_build_query($config, '', ';');
        // Tip: This should be wrapped in a try-catch. We'll learn how, soon.
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
    }

    public function query(string $query, array $params = []): self
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function get(): false|array
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail(): array
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        return $result;
    }

    public function find(): false|array
    {
        return $this->statement->fetch();
    }
}