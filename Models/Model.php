<?php

class Model {
    private static mysqli $connection;

    protected static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("localhost", "root", "", "snooknn_test");
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    public static function listAll(string $table, string $class, Where $where = new Where()): array {
        $list = [];
        $result = self::getConnection()->execute_query("SELECT * FROM " . $table . $where, [...$where->getArgs()]);
        while ($obj = $result->fetch_object($class)) {
            $list[] = $obj;
        }
        return $list;
    }

    public static function getRows(string $table, Where $where = new Where()): mysqli_result|bool {
        return self::getConnection()->execute_query("SELECT * FROM " . $table . $where, [...$where->getArgs()]);
    }

    public static function updateRows(string $table, Values $values, Where $where = new Where()): bool {
        return self::getConnection()->execute_query("UPDATE " . $table . " SET " . implode(", ", array_map(fn($value) => $value->getColumn() . " = " . $value->getMarker(), $values->values)) . $where, [...$values->getArgs(), ...$where->getArgs()]);
    }

    public static function deleteRows(string $table, Where $where = new Where()): bool {
        return self::getConnection()->execute_query("DELETE FROM " . $table . $where, [...$where->getArgs()]);
    }

    public static function insertRow(string $table, Values $values, bool $ignoreDuplicates): bool {
        return self::getConnection()->execute_query("INSERT INTO " . $table . " (" . implode(", ", $values->getColumns()) . ") VALUES (" . implode(", ", $values->getMarkers()) . ") " . ($ignoreDuplicates ? "ON DUPLICATE KEY UPDATE" : "") . ";", [...$values->getArgs()]);
    }
}

class Value {
    private mixed $arg;
    private string $column;
    private bool $encrypted;

    public function __construct(mixed $arg, string $column, bool $encrypted = false) {
        $this->arg = $arg;
        $this->column = $column;
        $this->encrypted = $encrypted;
    }

    public function getMarker(): string {
        return $this->encrypted ? "SHA1(?)" : "?";
    }

    public function getArg(): mixed {
        return $this->arg;
    }

    public function getColumn(): string {
        return $this->column;
    }
}

class Values {
    /**
     * @var Value[]
     */
    public array $values = [];

    public function add(Value $value): self {
        $this->values[] = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getMarkers(): array {
        return array_map(fn($value) => $value->getMarker(), $this->values);
    }

    /**
     * @return array
     */
    public function getArgs(): array {
        return array_map(fn($value) => $value->getArg(), $this->values);
    }

    /**
     * @return string[]
     */
    public function getColumns(): array {
        return array_map(fn($value) => $value->getColumn(), $this->values);
    }
}

class Where {
    private array $conditions = [];
    private array $args = [];

    public function addEquals(Value $value): self {
        $this->conditions[] = $value->getColumn() . " = " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addGreaterThan(Value $value): self {
        $this->conditions[] = $value->getColumn() . " > " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addLessThan(Value $value): self {
        $this->conditions[] = $value->getColumn() . " < " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addGreaterThanOrEquals(Value $value): self {
        $this->conditions[] = $value->getColumn() . " >= " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addLessThanOrEquals(Value $value): self {
        $this->conditions[] = $value->getColumn() . " <= " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addNotEquals(Value $value): self {
        $this->conditions[] = $value->getColumn() . " <> " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addLike(Value $value): self {
        $this->conditions[] = $value->getColumn() . " LIKE " . $value->getMarker();
        $this->args[] = $value->getArg();
        return $this;
    }

    public function addBetween(Value $min, Value $max): self {
        if ($min->getColumn() !== $max->getColumn()) throw new InvalidArgumentException("Columns must be the same");
        $this->conditions[] = $min->getColumn() . " BETWEEN " . $min->getMarker() . " AND " . $max->getMarker();
        $this->args[] = $min->getArg();
        $this->args[] = $max->getArg();
        return $this;
    }

    public function getArgs(): array {
        return $this->args;
    }

    public function __toString(): string {
        return $this->conditions ? " WHERE " . implode(" AND ", $this->conditions) : "";
    }
}
