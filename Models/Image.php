<?php

include_once "Model.php";

final class Image extends Model {
    public const TABLE = "images";

    final public const id = self::TABLE . ".id";
    final public const name = self::TABLE . ".name";
    final public const extension = self::TABLE . ".extension";

    public string $name;
    public string $extension;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->extension = $fields[self::extension];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::extension => $this->extension,
        ];
    }

    public static function new(string $name, string $extension): ?self {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::extension, $extension));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::name => $name,
                self::extension => $extension,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function getPath(): string {
        return "images/" . $this->id . "." . $this->extension;
    }
}