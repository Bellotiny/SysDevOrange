<?php

class Model {
    private static mysqli $connection;

    protected static function getConnection(): mysqli {
        if (!isset(self::$connection)) {
            $connection = new mysqli("174.93.150.8", "dev", "Vw3baJgbPS280RW", "snooknn_test");
            if ($connection->connect_error) die("Connection error!<br>" . $connection->connect_error);
            return self::$connection = $connection;
        }
        return self::$connection;
    }

    protected static function listAll(string $table, string $class, Where $where = new Where()): array {
        $list = [];
        $result = self::getConnection()->execute_query("SELECT * FROM " . $table . $where, [...$where->getArgs()]);
        while ($obj = $result->fetch_object($class)) {
            $list[] = $obj;
        }
        return $list;
    }

    protected static function getRows(string $table, Where $where = new Where()): mysqli_result|bool {
        return self::getConnection()->execute_query("SELECT * FROM " . $table . $where, [...$where->getArgs()]);
    }

    protected static function updateRow(string $table, Set $set, Where $where = new Where()): bool {
        return self::getConnection()->execute_query("UPDATE " . $table . $set . $where, [...$set->getArgs(), ...$where->getArgs()]);
    }

    protected static function deleteRow(string $table, Where $where = new Where()): bool {
        return self::getConnection()->execute_query("DELETE FROM " . $table . $where, [...$where->getArgs()]);
    }

    protected static function insertRow(string $table, Values $values): bool {
        return self::getConnection()->execute_query("INSERT INTO " . $table . $values, [...$values->getArgs()]);
    }
}

abstract class Statement {
    protected string $statement = "";
    protected array $args = [];

    abstract function getStatement(): string;

    public function getArgs(): array {
        return $this->args;
    }

    public function __toString(): string {
        return $this->getStatement();
    }
}

class Where extends Statement {
    private function add(string $condition): self {
        $this->statement .= (empty($this->statement) ? "" : " AND ") . $condition;
        return $this;
    }

    public function addEquals(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " = ?");
    }

    public function addGreaterThan(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " > ?");
    }

    public function addLessThan(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " < ?");
    }

    public function addGreaterThanOrEquals(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " >= ?");
    }

    public function addLessThanOrEquals(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " <= ?");
    }

    public function addNotEquals(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " <> ?");
    }

    public function addLike(string $column, mixed $value): self {
        $this->args[] = $value;
        return $this->add($column . " LIKE ?");
    }

    public function addBetween(string $column, mixed $min, mixed $max): self {
        $this->args[] = $min;
        $this->args[] = $max;
        return $this->add($column . " BETWEEN ? AND ?");
    }

    public function addIn(string $column, array $values): self {
        $this->args = array_merge($this->args, $values);
        return $this->add($column . " IN (" . implode(", ", array_fill(0, count($values), "?")) . ")");
    }

    public function getStatement(): string {
        return " WHERE " . $this->statement;
    }
}

class Set extends Statement {
    public function add(string $column, mixed $value): self {
        $this->statement .= (empty($this->statement) ? "" : ", ") . $column . " = ?";
        $this->args[] = $value;
        return $this;
    }

    public function getStatement(): string {
        return " SET " . $this->statement;
    }
}

class Values extends Statement {
    private bool $ignoreDuplicates;

    public function __construct(bool $ignoreDuplicates) {
        $this->ignoreDuplicates = $ignoreDuplicates;
    }

    public function add(string $column, mixed $value): self {
        $this->statement .= (empty($this->statement) ? "" : ", ") . $column;
        $this->args[] = $value;
        return $this;
    }

    public function getStatement(): string {
        return " (" . $this->statement . ") VALUES (" . implode(", ", array_fill(0, count($this->args), "?")) . ") " . ($this->ignoreDuplicates ? "ON DUPLICATE KEY UPDATE" : "");
    }
}
