<?php

include_once "Controllers/Controller.php";

class ServicesController extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/services/" . $action);
    }

    public function route(): void {
        $action = strtolower($_GET['action']);

        if($action == "list"){
            $services = Service::list();
            $colors = Color::list();
            $this->render("Services", "services", ["services" => $services, "colors" => $colors]);
        }
    }
    
}