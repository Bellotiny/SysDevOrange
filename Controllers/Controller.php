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

    final protected function ensureAuthenticated(): bool {
        if ($this->user === null) {
            include_once "Controllers/Account.php";
            Account::redirect(Account::LOGIN);
            return false;
        }
        return true;
    }

    final protected function verifyRights(?string $right = null): bool {
        return $this->user !== null && $this->user->hasRights(static::class, $right ?? $this->action);
    }

    final protected function ensureRights(?string $right = null, ?string $action = null, ?string $id = null): bool {
        if (!$this->ensureAuthenticated()) {
            return false;
        }
        if (!$this->verifyRights($right)) {
            self::back($action, $id);
            return false;
        }
        return true;
    }

    final protected static function redirect(?string $action = null, ?string $id = null): void {
        if (self::class === static::class) {  // If Controller::redirect() is called, redirect to home
            include_once "Controllers/Home.php";
            Home::redirect();
        } else {  // Otherwise, redirect to the controller it was called from
            header("Location: " . BASE_PATH . "/" . strtolower(static::class) . ($action ? "/$action" : "") . ($id ? "/$id" : ""));
        }
    }

    final protected static function back(?string $action = null, ?string $id = null): void {
        if (isset($_SERVER['HTTP_REFERER'])) {  // Try to redirect to the previous page
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {  // If there is no previous page, redirect using parameters
            static::redirect($action, $id);
        }
    }
}