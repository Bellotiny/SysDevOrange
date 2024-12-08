<?php

include_once "Models/Service.php";
include_once "Models/Color.php";

final class Services extends Controller {
    final public const SERVICES = "services";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::SERVICES);
    }

    public function route(): void {
        switch ($this->action) {
            case self::SERVICES:
                $this->render(["services" => Service::list(), "colors" => Color::list()]);
                break;
            default:
                self::redirect();
                break;
        }
    }
}