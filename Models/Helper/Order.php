<?php

class Order {
    private array $columns;
    private bool $descend;

    /**
     * @param string[] $columns
     * @param bool $ascend
     */
    public function __construct(array $columns = [], bool $descend = false) {
        $this->columns = $columns;
        $this->descend = $descend;
    }
    
    public function add(string $column): self {
        $this->columns[] = $column;
        return $this;
    }

    public function ascend(): self {
        $this->descend = false;
        return $this;
    }
    
    public function descend(): self {
        $this->descend = true;
        return $this;
    }

    public function __toString(): string {
        return " ORDER BY " . implode(", ", $this->columns) . ($this->descend ? " DESC" : "");
    }
}