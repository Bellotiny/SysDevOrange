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

    public final function save(): bool {
        $values = new Values();
        foreach(static::toAssoc() as $field => $value) {
            $values->add(new Value($field, $value));
        }
        $where = new Where();
        $where->addEquals(new Value(static::id, $this->id));
        return self::update($values, $where);
    }

    public final function delete(): bool {
        return self::executeQuery("DELETE FROM " . static::TABLE . " WHERE id = ?;", [$this->id]);
    }

    protected final static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("vpn.translator.li", "dev", "Vw3baJgbPS280RW", "snooknn_test", 443);
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    protected final static function executeQuery(string $query, array $args): bool|mysqli_result {
        return self::getConnection()->execute_query($query, $args);
    }

    protected final static function getFields(): array {
        return array_values((new ReflectionClass(static::class))->getConstants(ReflectionClassConstant::IS_FINAL));
    }

    protected static function getJoin(): ?Join {
        return null;
    }

    protected final static function update(Values $values, ?Where $where = null): bool {
        return self::executeQuery(
            "UPDATE `" . static::TABLE . "`" .
            " SET " . implode(", ", array_map(fn($value) => $value->getColumn() . " = " . $value->getMarker(), $values->values)) .
            ($where ?? "") .
            ";",
            [...$values->getArgs(), ...($where ? $where->getArgs() : [])]
        );
    }

    protected final static function insert(Values $values, bool $override): bool {
        return self::executeQuery(
            "INSERT INTO " . static::TABLE . "`" .
            " (" . implode(", ", $values->getColumns()) . ") VALUES (" . implode(", ", $values->getMarkers()) . ") " .
            ($override ? "ON DUPLICATE KEY UPDATE" : "") .
            ";",
            $values->getArgs()
        );
    }

    protected final static function select(?Where $where = null, ?Join $join = null, ?int $limit = null, ?int $offset = null): bool|mysqli_result {
        if ($join === null) $join = static::getJoin();
        return self::executeQuery(
            "SELECT " . implode(", ", array_map(fn($field) => $field . " as '" . $field . "'", array_merge(static::getFields(), ($join ? $join->getFields() : [])))) .
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
    public final static function list(?Where $where = null, ?Join $join = null, ?int $limit = null, ?int $offset = null): array {
        $list = [];
        $result = self::select($where, $join, $limit, $offset);
        while ($fields = $result->fetch_assoc()) {
            $list[] = new static($fields);
        }
        return $list;
    }

    public final static function get(?Where $where = null, ?Join $join = null, ?int $limit = null, ?int $offset = null): ?static {
        $fields = self::select($where, $join, $limit, $offset);
        if ($fields) {
            return new static($fields->fetch_assoc());
        }
        return null;
    }

    public final static function getFromId(int $id): ?static {
        $where = new Where();
        $where->addEquals(new Value(static::id, $id));
        return self::get($where);
    }
}