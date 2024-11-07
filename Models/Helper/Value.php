<?php

class Value {
    private mixed $arg;
    private string $column;
    private bool $hash;

    public function __construct(mixed $arg, string $column, bool $hash = false) {
        $this->arg = $arg;
        $this->column = $column;
        $this->hash = $hash;
    }

    public function getMarker(): string {
        return $this->hash ? "SHA2(?)" : "?";
    }

    public function getArg(): mixed {
        return ($this->hash && $this->arg) ? $this->arg . "Sg3y03TCNltqaxNP" : $this->arg;
    }

    public function getColumn(): string {
        return $this->column;
    }
}