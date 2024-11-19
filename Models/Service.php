<?php

include_once "Model.php";

class Service extends Model {
    public string $name;
    public float $price;
    public string $description;
    public int $duration;
    public string $type;
    public int $visibility;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->type = $fields[self::getTable() . '.type'] ?? 'Unknown'; 
        $this->description = $fields[self::getTable() . '.description'];
        $this->price = $fields[self::getTable() . '.price'];
        $this->duration = $fields[self::getTable() . '.duration'];
        $this->visibility = (int) $fields[self::getTable() . '.visibility'];
        
    }

    public static function getTable(): string {
        return "services";
    }

    public static function getFields(): array {
        return ["id", "name", "type", "price", "description", "duration","visibility"];
    }

    public static function new(string $name, float $price, string $description, int $duration,string $type,int $visibility): ?Service {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".type", $type));
        $values->add(new Value(self::getTable() . ".price", $price));
        $values->add(new Value(self::getTable() . ".type", $type));
        $values->add(new Value(self::getTable() . ".description", $description));
        $values->add(new Value(self::getTable() . ".duration", $duration));
        $values->add(new Value(self::getTable() . ".visibility", $visibility));
        
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new service([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".type" => $type,
                self::getTable() . ".price" => $price,
                self::getTable() . ".description" => $description,
                self::getTable() . ".duration" => $duration,
                self::getTable() . ".visibility" => $visibility,
                
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".type", $this->type)); 
        $values->add(new Value(self::getTable() . ".price", $this->price));
        $values->add(new Value(self::getTable() . ".description", $this->description));
        $values->add(new Value(self::getTable() . ".duration", $this->duration));
        $values->add(new Value(self::getTable() . ".visibility", $this->visibility));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}