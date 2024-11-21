<?php

include_once "Models/Service.php";
include_once "Models/Color.php";

final class Services extends Controller {
    public function route(): void {
        $this->render("Services", "services", ["services" => Service::list(), "colors" => Color::list()]);
    }
}