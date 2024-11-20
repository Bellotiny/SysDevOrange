<?php

final class Home extends Controller {
    public function route(): void {
        $this->render("Home", "home");
    }
}