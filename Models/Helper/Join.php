<?php

class Join {
    private string $table;
    private string $column1;
    private string $column2;

    public function __construct(string $table, string $column1, string $column2) {
        $this->table = $table;
        $this->column1 = $column1;
        $this->column2 = $column2;
    }

    public function getArgs(): array {
        return [$this->column1, $this->column2];
    }

    public function __toString(): string {
        return $this->table ? " INNER JOIN " . $this->table . " ON " . $this->column1 . " = " . $this->column2 : "";
    }
}