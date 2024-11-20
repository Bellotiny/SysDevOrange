<?php

class Join {
    private array $fields = [];
    private string $statement = "";

    private function add(string $type, array $fields, string $table, string $column1, string $column2): self {
        array_push($this->fields, ...$fields);
        $this->statement .= " {$type} JOIN {$table} ON {$column1} = {$column2}";
        return $this;
    }

    public function addInner(array $fields, string $table, string $column1, string $column2): self {
        return $this->add("INNER", $fields, $table, $column1, $column2);
    }

    public function addLeft(array $fields, string $table, string $column1, string $column2): self {
        return $this->add("LEFT", $fields, $table, $column1, $column2);
    }

    public function addRight(array $fields, string $table, string $column1, string $column2): self {
        return $this->add("RIGHT", $fields, $table, $column1, $column2);
    }

    public function addFull(array $fields, string $table, string $column1, string $column2): self {
        return $this->add("FULL", $fields, $table, $column1, $column2);
    }

    public function getFields(): array {
        return $this->fields;
    }

    public function __toString(): string {
        return $this->statement;
    }
}