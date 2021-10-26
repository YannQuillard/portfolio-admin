<?php

declare(strict_types=1);

namespace App\Model;

use PDO;

final class Contact {
    protected $table = 'contact';

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAllContact() {
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
}