<?php

include_once "Operator.php";

class Where {
    private string $statement;

    /**
     * @var array
     */
    private array $args;

    public function __construct(Operator $operator) {
        $this->statement = $operator->statement;
        $this->args = $operator->args;
    }

    public function addAnd(Operator $operator): self {
        $this->statement .= " AND " . $operator->statement;
        array_push($this->args, ...$operator->args);
        return $this;
    }

    public function addOr(Operator $operator): self {
        $this->statement .= " OR " . $operator->statement;
        array_push($this->args, ...$operator->args);
        return $this;
    }

    public function getArgs(): array {
        return $this->args;
    }

    public function __toString(): string {
        return " WHERE " . $this->statement;
    }
}