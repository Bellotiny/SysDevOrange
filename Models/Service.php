<?php

include_once "Model.php";

class Service extends Model {
    private $id;
    private $name;
    private $price;
    private $description;
    private $duration;

    /**
     * @return Service[]
     */
    public static function list(): array {
        return Model::listAll("services", "Service");
    }

    public static function getFromId(int $id): Service|false|null {
        $where = new Where();
        $where->addEquals(new Value($id, "id"));
        return Model::getRows("services", $where)->fetch_object("Service");
    }

    public static function new(string $name, float $price, string $description, int $duration): Service|false {
        $service = new Service();
        $values = new Values();
        $values->add(new Value($service->name = $name, "name"));
        $values->add(new Value($service->price = $price, "price"));
        $values->add(new Value($service->description = $description, "description"));
        $values->add(new Value($service->duration = $duration, "duration"));

        try {
            Model::insertRow("services", $values, false);
            $service->id = self::getConnection()->insert_id;
            return $service;
        } catch (Exception $e) {
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
        return Model::updateRows("services", $values, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return Model::deleteRows("services", $where);
    }
}