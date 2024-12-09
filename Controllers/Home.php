<?php

final class Home extends Controller {
    final public const HOME = "home";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::HOME);
    }

    public function route(): void {
        switch ($this->action) {
            case self::HOME:
                $this->render();
                break;
            default:
                self::redirect();
                break;
        }
    }
}