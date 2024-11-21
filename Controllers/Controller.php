<?php

include_once "Account.php";
include_once "Home.php";

abstract class Controller {
    protected ?User $user;
    protected string $lang;

    public function __construct() {
        $this->user = User::getFromCookie();
    }

    public abstract function route(): void;

    public final function render($controller, $view, $data = []): void {
        extract($data);
        include "Views/$controller/$view.php";
    }

    protected final function verifyRights(string $action): bool {
        if ($this->user === null) {
            Account::redirect("login");
            return false;
        }
        if (!$this->user->hasRights(static::class, $action)) {
            $this::back();
            return false;
        }
        return true;
    }

    final public static function redirect(string $action = "", ?string $id = null): void {
        if (self::class === static::class) {
            Home::redirect();
        }
        header("Location: " . BASE_PATH . "/" . strtolower(static::class) . "/" . $action . ($id ? "/$id" : ""));
    }

    protected final static function back(): void {
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['PHP_SELF'])));
    }
}