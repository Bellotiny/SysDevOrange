<?php

include_once "Value.php";

class Values {
    /**
     * @var Value[]
     */
    public array $values = [];

    public function add(Value $value): self {
        $this->values[] = $value;
        return $this;
    }

    /**
     * @return string[]
     */
    public function getMarkers(): array {
        return array_map(fn($value) => $value->getMarker(), $this->values);
    }

    /**
     * @return array
     */
    public function getArgs(): array {
        return array_map(fn($value) => $value->getArg(), $this->values);
    }

    /**
     * @return string[]
     */
    public function getColumns(): array {
        return array_map(fn($value) => $value->getColumn(), $this->values);
    }
}