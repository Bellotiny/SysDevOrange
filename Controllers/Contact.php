<?php

include_once "Controllers/Controller.php";

class GalleryController extends Controller {
    private const INSTAGRAM_ACCESS_TOKEN = 'IGQWROU1d1QVlBWWVzeVRrTkdVQWI4UWozRnRGcUZAKVFctMmRWcFRyT1FPek1oSWtOM2tHQ2ZAVNWxHdlFkalpaY3ZATUkx0SXZAXOERscGRqeW9ZAaWFfWVc0QlJONEJGZAzNxRmR6YTJJcjJlQm10SUp0NWZAZAb2xjYkEZD';

    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/contact/" . $action);
    }

    public function route(): void {
        $url = "https://graph.instagram.com/me/media?fields=id,caption,media_url&access_token=" . self::INSTAGRAM_ACCESS_TOKEN;
        //var_dump($url);

        // Initialize cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute the request
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);
        //var_dump($response);
        if (isset($data['data'])) {
            $this->render("Gallery", "gallery",$data);
            
        } else {
            echo "Error fetching data.";
        }


      
    }
}