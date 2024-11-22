<?php

include_once "Model.php";

final class Service extends Model {
    public const TABLE = "services";

    final public const id = self::TABLE . ".id";
    final public const name = self::TABLE . ".name";
    final public const description = self::TABLE . ".description";
    final public const type = self::TABLE . ".type";
    final public const price = self::TABLE . ".price";
    final public const duration = self::TABLE . ".duration";
    final public const visibility = self::TABLE . ".visibility";

    public string $name;
    public string $description;
    public string $type;
    public float $price;
    public int $duration;
    public bool $visibility;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->description = $fields[self::description];
        $this->type = $fields[self::type];
        $this->price = $fields[self::price];
        $this->duration = $fields[self::duration];
        $this->visibility = $fields[self::visibility];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::description => $this->description,
            self::type => $this->type,
            self::price => $this->price,
            self::duration => $this->duration,
            self::visibility => $this->visibility,
        ];
    }

    public static function new(string $name, string $description, string $type, float $price, int $duration, bool $visibility): ?self {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::description, $description));
        $values->add(new Value(self::type, $type));
        $values->add(new Value(self::price, $price));
        $values->add(new Value(self::duration, $duration));
        $values->add(new Value(self::visibility, $visibility));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::name => $name,
                self::description => $description,
                self::type => $type,
                self::price => $price,
                self::duration => $duration,
                self::visibility => $visibility,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}