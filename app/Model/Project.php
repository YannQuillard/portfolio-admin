<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

final class Project {
    protected $table = 'project';

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllProject() {
        $query = 'SELECT * FROM Project;';

        return $this->connection->query($query);
    }

    public function getOneProjectById() {

    }
}