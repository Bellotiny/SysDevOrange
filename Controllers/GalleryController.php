<?php

include_once "Controllers/Controller.php";

class GalleryController extends Controller {
    function route(): void {
        $this->render("Gallery", "gallery");
    }
}