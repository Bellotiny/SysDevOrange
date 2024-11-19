<?php

class Value {
    private string $column;
    private mixed $arg;
    private string $marker;

    public function __construct(string $column, mixed $arg, bool $hash = false) {
        $this->column = $column;
        if ($hash) {
            $this->arg = $arg . "Sg3y03TCNltqaxNP";  // Add randomly generated salt
            $this->marker = "SHA2(?, 256)";
        } else {
            $this->arg = $arg;
            $this->marker = "?";
        }
    }

    public function getColumn(): string {
        return $this->column;
    }

    public function getArg(): mixed {
        return $this->arg;
    }

    public function getMarker(): string {
        return $this->marker;
    }
}