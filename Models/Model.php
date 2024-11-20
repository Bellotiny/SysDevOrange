<?php

include_once "Helper/Join.php";
include_once "Helper/Value.php";
include_once "Helper/Values.php";
include_once "Helper/Where.php";

abstract class Model {
    public int $id;
    private static mysqli $connection;

    public abstract function __construct(array $fields);

    protected abstract function toAssoc(): array;

    public function save(): bool {
        $values = new Values();
        foreach(static::toAssoc() as $field => $value) {
            $values->add(new Value($field, $value));
        }
        $where = new Where();
        $where->addEquals(new Value(static::id, $this->id));
        return self::update($values, $where);
    }

    public function delete(): bool {
        return self::executeQuery("DELETE FROM " . static::TABLE . " WHERE id = ?;", [$this->id]);
    }

    protected static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("vpn.translator.li", "dev", "Vw3baJgbPS280RW", "snooknn_test", 443);
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    protected static function executeQuery(string $query, array $args): bool|mysqli_result {
        return self::getConnection()->execute_query($query, $args);
    }

    protected static function getFields(): array {
        return (new ReflectionClass(static::class))->getConstants(ReflectionClassConstant::IS_FINAL);
    }

    protected static function getJoin(): ?Join {
        return null;
    }

    protected static function update(Values $values, ?Where $where = null): bool {
        return self::executeQuery(
            "UPDATE `" . static::TABLE . "`" .
            " SET " . implode(", ", array_map(fn($value) => $value->getColumn() . " = " . $value->getMarker(), $values->values)) .
            ($where ?? "") .
            ";",
            [...$values->getArgs(), ...($where ? $where->getArgs() : [])]
        );
    }

    protected static function insert(Values $values, bool $ignoreDuplicates): bool {
        return self::executeQuery(
            "INSERT INTO " . static::TABLE . "`" .
            " (" . implode(", ", $values->getColumns()) . ") VALUES (" . implode(", ", $values->getMarkers()) . ") " .
            ($ignoreDuplicates ? "ON DUPLICATE KEY UPDATE" : "") .
            ";",
            $values->getArgs()
        );
    }

    protected static function select(?Join $join = null, ?Where $where = null, ?int $limit = null, ?int $offset = null): bool|mysqli_result {
        return self::executeQuery(
            "SELECT " . implode(", ", array_map(fn($field) => $field . " as '" . $field . "'", array_merge(self::getFields(), ($join ? $join->getFields() : [])))) .
            " FROM `" . static::TABLE . "`" .
            ($join ?? "") .
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
        $result = self::select(self::getJoin(), $where, $limit, $offset);
        while ($fields = $result->fetch_assoc()) {
            $list[] = new static($fields);
        }
        return $list;
    }

    public static function get(?Where $where = null, ?int $limit = null, ?int $offset = null): ?static {
        $fields = self::select(self::getJoin(), $where, $limit, $offset);
        if ($fields) {
            return new static($fields->fetch_assoc());
        }
        return null;
    }

    public static function getFromId(int $id): ?static {
        $where = new Where();
        $where->addEquals(new Value(static::id, $id));
        return self::get($where);
    }
}