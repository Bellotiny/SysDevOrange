<?php

class Model {
    private static mysqli $connection;

    protected static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("localhost", "root", "", "snooknn");
            if ($connection->connect_error) {
                die("Connection error!<br>" . $connection->connect_error);
            }
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    protected static function query(string $query, ?array $parameters = null): bool|mysqli_result {
        return self::getConnection()->execute_query($query, $parameters);
    }

    protected static function listAll(string $table, string $class): array {
        $list = [];
        $result = self::query("SELECT * FROM ?", [$table]);
        while ($obj = $result->fetch_object($class)) {
            $list[] = $obj;
        }
        return $list;
    }

    protected static function deleteRow(string $table, string $where, array $whereArg): bool {
        return self::query("DELETE FROM ? WHERE " . $where, [$table, $where, ...$whereArg]);
    }

    protected static function insertRow(string $table, array $columns, array $values, bool $ignore = false): bool {
        return self::query("INSERT " . ($ignore ? "IGNORE" : "") . " INTO ? (" . self::multiValues($columns) . ") VALUES " . self::multiQuestion($values), [$table, ...$values]);
    }

    protected static function updateRow(string $table, string $where, array $whereArg, array $columns, array $values): bool {
        return self::query("UPDATE ? SET " . self::multiEquals($columns) . " WHERE " . $where, [$table, ...$values, ...$whereArg]);
    }

    protected static function getRows(string $table, string $where, array $whereArg): mysqli_result {
        return self::query("SELECT * FROM ? WHERE " . $where, [$table, ...$whereArg]);
    }

    /**
     * @param string[] $options
     * @return string Like "option1 = ?, option2 = ?, option3 = ?"
     */
    protected static function multiEquals(array $options): string {
        return implode(", ", array_map(fn($key) => $key . " = ?", $options));
    }

    /**
     * @param string[] $options
     * @return string Like "?, ?, ?"
     */
    protected static function multiQuestion(array $options): string {
        return implode(", ", array_fill(0, count($options), "?"));
    }

    /**
     * @param string[] $options
     * @return string Like "option1, option2, option3"
     */
    protected static function multiValues(array $options): string {
        return implode(", ", $options);
    }
}