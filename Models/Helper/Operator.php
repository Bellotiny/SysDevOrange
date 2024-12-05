<?php

class Operator {
    public string $statement;
    public array $args;

    public function __construct(string $statement, array $args) {
        $this->statement = $statement;
        $this->args = $args;
    }
}

class Equals extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            $value->getColumn() . ($not ? " <> " : " = ") . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class GreaterThan extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            ($not ? "NOT " : "") . $value->getColumn() . " > " . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class LessThan extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            ($not ? "NOT " : "") . $value->getColumn() . " < " . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class GreaterThanOrEquals extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            ($not ? "NOT " : "") . $value->getColumn() . " >= " . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class LessThanOrEquals extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            ($not ? "NOT " : "") . $value->getColumn() . " <= " . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class Like extends Operator {
    public function __construct(Value $value, bool $not = false) {
        parent::__construct(
            $value->getColumn() . ($not ? " NOT" : "") . " LIKE " . $value->getMarker(),
            [$value->getArg()],
        );
    }
}

class Between extends Operator {
    /**
     * $min should be lower than $max
     */
    public function __construct(Value $min, Value $max, bool $not = false) {
        parent::__construct(
            $min->getColumn() . ($not ? " NOT" : "") . " BETWEEN " . $min->getMarker() . " AND " . $max->getMarker(),
            [$min->getArg(), $max->getArg()],
        );
    }
}

class In extends Operator {
    /**
     * $values should all have the same column
     */
    public function __construct(Values $values, bool $not = false) {
        parent::__construct(
            $values->getColumns()[0] . ($not ? " NOT" : "") . " IN (" . implode(", ", $values->getMarkers()) . ")",
            $values->getArgs(),
        );
    }
}