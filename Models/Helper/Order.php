<?php

class Order {
    private array $columns;
    private bool $ascend;

    /**
     * @param string[] $columns
     * @param bool $ascend
     */
    public function __construct(array $columns = [], bool $ascend = false) {
        $this->columns = $columns;
        $this->ascend = $ascend;
    }
    
    public function add(string $column): self {
        $this->columns[] = $column;
        return $this;
    }

    public function ascend(): self {
        $this->ascend = true;
        return $this;
    }
    
    public function descend(): self {
        $this->ascend = false;
        return $this;
    }

    public function __toString(): string {
        return " ORDER BY " . implode(", ", $this->columns) . ($this->ascend ? " DESC" : "");
    }
}