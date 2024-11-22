<?php

final class About extends Controller {
    public function route(): void {
        $this->render("About", "about");
    }
}