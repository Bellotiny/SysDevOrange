<?php

class Where {
    /**
     * @var string[]
     */
    private array $conditions = [];

    /**
     * @var array
     */
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