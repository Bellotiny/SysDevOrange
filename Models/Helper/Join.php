<?php

class Join {
    private array $fields = [];
    private string $statement = "";

    private function add(string $type, array $fields, string $table, string $column1, string $column2, ?Join $join = null): self {
        array_push($this->fields, ...$fields);
        $this->statement .= " {$type} JOIN {$table} ON {$column1} = {$column2}";
        if ($join) {
            array_push($this->fields, ...$join->fields);
            $this->statement .= $join->statement;
        }
        return $this;
    }

    public function addInner(array $fields, string $table, string $column1, string $column2, ?Join $join = null): self {
        return $this->add("INNER", $fields, $table, $column1, $column2, $join);
    }

    public function addLeft(array $fields, string $table, string $column1, string $column2, ?Join $join = null): self {
        return $this->add("LEFT", $fields, $table, $column1, $column2, $join);
    }

    public function addRight(array $fields, string $table, string $column1, string $column2, ?Join $join = null): self {
        return $this->add("RIGHT", $fields, $table, $column1, $column2, $join);
    }

    public function addFull(array $fields, string $table, string $column1, string $column2, ?Join $join = null): self {
        return $this->add("FULL", $fields, $table, $column1, $column2, $join);
    }

    public function getFields(): array {
        return $this->fields;
    }

    public function __toString(): string {
        return $this->statement;
    }
}