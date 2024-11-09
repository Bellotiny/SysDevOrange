<?php

include_once "Model.php";

class Service extends Model {
    public string $name;
    public float $price;
    public string $description;
    public int $duration;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->description = $fields[self::getTable() . '.description'];
        $this->duration = $fields[self::getTable() . '.duration'];
    }

    public static function getTable(): string {
        return "services";
    }

    public static function getFields(): array {
        return ["id", "name", "price", "description", "duration"];
    }

    public static function new(string $name, float $price, string $description, int $duration): ?Service {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".price", $price));
        $values->add(new Value(self::getTable() . ".description", $description));
        $values->add(new Value(self::getTable() . ".duration", $duration));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new service([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".price" => $price,
                self::getTable() . ".description" => $description,
                self::getTable() . ".duration" => $duration,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".price", $this->price));
        $values->add(new Value(self::getTable() . ".description", $this->description));
        $values->add(new Value(self::getTable() . ".duration", $this->duration));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}