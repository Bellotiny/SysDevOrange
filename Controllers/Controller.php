<?php

include_once "Models/Token.php";

abstract class Controller {
    protected string $action;
    protected ?int $id;
    protected ?User $user;

    public function __construct(string $action) {
        $this->action = $action;
        $this->id = $_GET["id"] ?? null;
        $this->user = Token::getFromCookie()?->user;
    }

    public abstract function route(): void;

    public final function render($data = []): void {
        extract($data);
        include "Views/" . static::class . "/" . $this->action . ".php";
    }

    protected final function verifyRights(?string $action = null): bool {
        if ($this->user === null) {
            include_once "Controllers/Account.php";
            Account::redirect(Account::LOGIN);
            return false;
        }
        if (!$this->user->hasRights(static::class, $action ?? $this->action)) {
            self::back();
            return false;
        }
        return true;
    }

    protected final function checkAuthorization(?string $action = null): bool {
        if ($this->user === null) {
            return false;
        }
        if (!$this->user->hasRights(static::class, $action ?? $this->action)) {
            return false;
        }
        return true;
    }

    final public static function redirect(?string $action = null, ?string $id = null): void {
        if (self::class === static::class) {
            include_once "Controllers/Home.php";
            Home::redirect();
        }
        header("Location: " . BASE_PATH . "/" . strtolower(static::class) . ($action ? "/$action" : "") . ($id ? "/$id" : ""));
    }

    protected final static function back(): void {
        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? dirname($_SERVER['PHP_SELF'])));
    }
}