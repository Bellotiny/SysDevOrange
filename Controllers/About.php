<?php

final class About extends Controller {
    final public const ABOUT = "about";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::ABOUT);
    }

    public function route(): void {
        switch ($this->action) {
            case self::ABOUT:
                $this->render();
                break;
            default:
                self::redirect();
                break;
        }
    }
}