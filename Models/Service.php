<?php

include_once "Model.php";

class Service extends Model {
    public string $name;
    public float $price;
    public string $description;
    public int $duration;

    public static function getTable(): string {
        return "bookings";
    }

    public static function new(string $name, float $price, string $description, int $duration): ?Service {
        $service = new Service();
        $values = new Values();
        $values->add(new Value("name", $service->name = $name));
        $values->add(new Value("price", $service->price = $price));
        $values->add(new Value("description", $service->description = $description));
        $values->add(new Value("duration", $service->duration = $duration));

        try {
            self::insertRow($values, false);
            $service->id = self::getConnection()->insert_id;
            return $service;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("name", $this->name));
        $values->add(new Value("price", $this->price));
        $values->add(new Value("description", $this->description));
        $values->add(new Value("duration", $this->duration));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}