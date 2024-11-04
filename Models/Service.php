<?php

include_once "Model.php";

class Service extends Model {
    public string $name;
    public float $price;
    public string $description;
    public int $duration;

    protected static function getTable(): string {
        return "bookings";
    }

    public static function new(string $name, float $price, string $description, int $duration): Service|false {
        $service = new Service();
        $values = new Values();
        $values->add(new Value($service->name = $name, "name"));
        $values->add(new Value($service->price = $price, "price"));
        $values->add(new Value($service->description = $description, "description"));
        $values->add(new Value($service->duration = $duration, "duration"));

        try {
            self::insertRow($values, false);
            $service->id = self::getConnection()->insert_id;
            return $service;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->name, "name"));
        $values->add(new Value($this->price, "price"));
        $values->add(new Value($this->description, "description"));
        $values->add(new Value($this->duration, "duration"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::deleteRows($where);
    }
}