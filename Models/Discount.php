<?php

include_once "Model.php";

final class Discount extends Model {
    public const TABLE = "discounts";

    final public const id = self::TABLE . ".id";
    final public const name = self::TABLE . ".name";
    final public const type = self::TABLE . ".type";
    final public const start = self::TABLE . ".start";
    final public const end = self::TABLE . ".end";
    final public const percent = self::TABLE . ".percent";
    final public const amount = self::TABLE . ".amount";

    public string $name;
    public string $type;
    public string $start;
    public string $end;
    public float $percent;
    public float $amount;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->type = $fields[self::type];
        $this->start = strtotime($fields[self::start]);
        $this->end = strtotime($fields[self::end]);;
        $this->percent = $fields[self::percent];
        $this->amount = $fields[self::amount];
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::type => $this->type,
            self::start => $this->start,
            self::end => $this->end,
            self::percent => $this->percent,
            self::amount => $this->amount,
        ];
    }

    public static function new(string $name,string $type, string $start, string $end, float $percent, float $amount): ?self {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::type, $type));
        $values->add(new Value(self::start, $start));
        $values->add(new Value(self::end, $end));
        $values->add(new Value(self::percent, $percent));
        $values->add(new Value(self::amount, $amount));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::name => $name,
                self::type => $type,
                self::start => $start,
                self::end => $end,
                self::percent => $percent,
                self::amount => $amount,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}