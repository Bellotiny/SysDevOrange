<?php

include_once "Controllers/Controller.php";

class GalleryController extends Controller {
    private const INSTAGRAM_ACCESS_TOKEN = 'IGQWROU1d1QVlBWWVzeVRrTkdVQWI4UWozRnRGcUZAKVFctMmRWcFRyT1FPek1oSWtOM2tHQ2ZAVNWxHdlFkalpaY3ZATUkx0SXZAXOERscGRqeW9ZAaWFfWVc0QlJONEJGZAzNxRmR6YTJJcjJlQm10SUp0NWZAZAb2xjYkEZD';

    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/contact/" . $action);
    }

    public function route(): void {
        $this->render("Contact", "contact");
        
    }
}