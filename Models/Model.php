<?php

include_once "Helper/Value.php";
include_once "Helper/Values.php";
include_once "Helper/Where.php";

abstract class Model {
    public int $id;
    private static mysqli $connection;

    public abstract function __construct(array $fields);

    public abstract static function getTable(): string;

    public abstract static function getFields(): array;

    public abstract function save(): bool;

    protected static function getSelectFields(): string {
        return implode(", ", array_map(fn($field) => static::getTable() . "." . $field . " as '" . static::getTable() . "." . $field . "'", static::getFields()));
    }

    public static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("vpn.translator.li", "dev", "Vw3baJgbPS280RW", "snooknn_test", 443);
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    public static function executeQuery(string $query, array $args): bool|mysqli_result {
        return self::getConnection()->execute_query($query, $args);
    }

    protected static function update(Values $values, ?Where $where = null): bool {
        return self::executeQuery(
            "UPDATE " . static::getTable() .
            " SET " . implode(", ", array_map(fn($value) => $value->getColumn() . " = " . $value->getMarker(), $values->values)) .
            ($where ?? "") .
            ";",
            [...$values->getArgs(), ...($where ? $where->getArgs() : [])]
        );
    }

    protected static function insert(Values $values, bool $ignoreDuplicates): bool {
        return self::executeQuery(
            "INSERT INTO " . static::getTable() .
            " (" . implode(", ", $values->getColumns()) . ") VALUES (" . implode(", ", $values->getMarkers()) . ") " .
            ($ignoreDuplicates ? "ON DUPLICATE KEY UPDATE" : "") .
            ";",
            $values->getArgs()
        );
    }

    public function delete(): bool {
        return self::executeQuery("DELETE FROM " . static::getTable() . " WHERE id = ?;", [$this->id]);
    }

    protected static function select(?Where $where = null, ?int $limit = null, ?int $offset = null): bool|mysqli_result {
        return self::executeQuery(
            "SELECT " . self::getSelectFields() . "  FROM " . static::getTable() .
            ($where ?? "") .
            ($limit ? " LIMIT " . $limit : "") .
            ($offset ? " OFFSET " . $offset : ""),
            ($where ? $where->getArgs() : [])
        );
    }

    /**
     * @return static[]
     */
    public static function list(?Where $where = null, ?int $limit = null, ?int $offset = null): array {
        $list = [];
        $result = static::select($where, $limit, $offset);
        while ($fields = $result->fetch_assoc()) {
            $list[] = new static($fields);
        }
        return $list;
    }

    public static function getFromId(int $id): ?static {
        $where = new Where();
        $where->addEquals(new Value(static::getTable() . ".id", $id));
        return static::list($where)[0] ?? null;
    }
}