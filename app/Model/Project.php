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
        $query = "SELECT * FROM $this->table;";

        $response = $this->connection->query($query);

        $array = [];

        while($data = $response->fetch())
        {
            array_push($array, $data);
        }
        $response->closeCursor();
        return $array;
    }

    public function getOneProjectById(INT $id) {
        $query = "SELECT * FROM $this->table WHERE id=:id;";
        $request = $this->connection->prepare($query);

        $request->execute([
            'id' => $id,
        ]);

        return $request->fetch();
    }
}