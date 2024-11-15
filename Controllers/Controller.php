<?php

include_once "Controllers/Account.php";

abstract class Controller {
    protected ?User $user;
    protected string $lang;

    public function __construct() {
        $this->user = User::getFromCookie();
        $this->lang = $_COOKIE['lang'] ?? "en";
        setcookie("token", $this->lang, time() + 34560000, "/");  // Reset lang cookie duration to 400 days
    }

    public abstract static function redirect(string $action = ""): void;

    public abstract function route(): void;

    protected function verifyRights(string $action): bool {
        if (is_null($this->user)) {
            Account::redirect("login");
            return false;
        }
        if (!$this->user->hasRights(static::class, $action)) {
            $this->back();
            return false;
        }
        return true;
    }

    protected function back(): void {
        header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['PHP_SELF'])));
    }

    public function render(string $controller, string $view, array $data = []): void {
        include "Views/$controller/$view.php";
    }
}