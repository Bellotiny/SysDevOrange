<?php

class Model {
    private static mysqli $connection;

    protected static function query(string $query, ?array $parameters = null): bool|mysqli_result {
        if (!isset(self::$connection)) {
            $connection = new mysqli("localhost", "root", "", "snooknn");
            if ($connection->connect_error) {
                die("Connection error!<br>" . $connection->connect_error);
            }
            self::$connection = $connection;
        }
        return self::$connection->execute_query($query, $parameters);
    }

    protected static function listAll(String $table, String $class): array {
        $list = [];
        $result = self::query("SELECT * FROM ?", [$table]);
        while ($obj = $result->fetch_object($class)) {
            $list[] = $obj;
        }
        return $list;
    }

    protected static function deleteAllWhere(String $table, String $where, $whereArg): bool {
        return self::query("DELETE FROM ? WHERE ? = ?", [$table, $where, $whereArg]);
    }

    protected static function updateOneWhere(String $table, String $where, $whereArg, String $column, $value): bool {
        return self::query("UPDATE ? SET ? = ? WHERE ? = ?", [$table, $column, $value, $where, $whereArg]);
    }

    protected static function updateManyWhere(String $table, String $where, $whereArg, array $values): bool {
        return self::query("UPDATE ? SET " . implode(", ", array_map(fn($key)=>$key." = ?", array_keys($values))) . " WHERE ? = ?", [$table, ...array_values($values), $where, $whereArg]);
    }

    protected static function insertMany(String $table, String $columns, String $values): bool {
        return self::query("INSERT INTO ? (?) VALUES ?", [$table, $columns, $values]);
    }

    protected static function getAllWhere(String $table, String $class, String $where, $whereArg): Object {
        return self::query("SELECT * FROM ? WHERE ? = ?", [$table, $where, $whereArg])->fetch_object($class);
    }
}