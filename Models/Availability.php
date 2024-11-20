<?php

include_once "Model.php";

class Availability extends Model {
    public \DateTime $timeslot;
    public ?int $bookingID;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->timeslot = new \DateTime($fields[self::getTable() . '.timeslot']);
        $this->bookingID = $fields[self::getTable() . '.bookingID'];
    }

    public static function getTable(): string {
        return "availabilities";
    }

    public static function getFields(): array {
        return ["id", "timeslot", "bookingID"];
    }

    public static function new(\DateTime $timeslot, int $bookingID): ?Availability {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".timeslot", $start));
        $values->add(new Value(self::getTable() . ".bookingID", $bookingID));

        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Availability([
                self::getTable() . ".id" => $id,
                self::getTable() . ".timeslot" => $timeslot,
                self::getTable() . ".bookingID" => $bookingID,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".timeslot", $this->timeslot));
        $values->add(new Value(self::getTable() . ".bookingID", $this->bookingID));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}