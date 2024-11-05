<?php

include_once "Helper/Value.php";
include_once "Helper/Values.php";
include_once "Helper/Where.php";

abstract class Model {
    public int $id;
    private static mysqli $connection;

    protected abstract static function getTable(): string;

    public static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            //$connection = new mysqli("174.94.90.171", "dev", "Vw3baJgbPS280RW", "snooknn_test");
            $connection = new mysqli("localhost", "root", "", "snooknn_test");
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    public static function executeQuery(string $query, array $args): bool|mysqli_result {
        return self::getConnection()->execute_query($query, $args);
    }

    /**
     * @return static[]
     */
    public static function list(Where $where = new Where()): array {
        $list = [];
        $result = self::executeQuery("SELECT * FROM " . static::getTable() . $where, $where->getArgs());
        while ($obj = $result->fetch_object(static::class)) {
            $list[] = $obj;
        }
        return $list;
    }

    protected static function getRows(Where $where = new Where()): mysqli_result|bool {
        return self::executeQuery("SELECT * FROM " . static::getTable() . $where, $where->getArgs());
    }

    protected static function updateRows(Values $values, Where $where = new Where()): bool {
        return self::executeQuery("UPDATE " . static::getTable() . " SET " . implode(", ", array_map(fn($value) => $value->getColumn() . " = " . $value->getMarker(), $values->values)) . $where, [...$values->getArgs(), ...$where->getArgs()]);
    }

    protected static function deleteRows(Where $where = new Where()): bool {
        return self::executeQuery("DELETE FROM " . static::getTable() . $where . ";", $where->getArgs());
    }

    protected static function insertRow(Values $values, bool $ignoreDuplicates): bool {
        return self::executeQuery("INSERT INTO " . static::getTable() . " (" . implode(", ", $values->getColumns()) . ") VALUES (" . implode(", ", $values->getMarkers()) . ") " . ($ignoreDuplicates ? "ON DUPLICATE KEY UPDATE" : "") . ";", $values->getArgs());
    }

    public static function getFromId(int $id): static|false|null {
        $where = new Where();
        $where->addEquals(new Value($id, "id"));
        return self::getRows($where)->fetch_object(static::class);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::deleteRows($where);
    }

    public abstract function save(): bool;
}