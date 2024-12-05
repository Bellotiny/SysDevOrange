<?php

final class Gallery extends Controller {
    final public const LIST = "list";

    private const INSTAGRAM_ACCESS_TOKEN = "IGQWROU1d1QVlBWWVzeVRrTkdVQWI4UWozRnRGcUZAKVFctMmRWcFRyT1FPek1oSWtOM2tHQ2ZAVNWxHdlFkalpaY3ZATUkx0SXZAXOERscGRqeW9ZAaWFfWVc0QlJONEJGZAzNxRmR6YTJJcjJlQm10SUp0NWZAZAb2xjYkEZD";

    public function route(): void {
        $url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=" . self::INSTAGRAM_ACCESS_TOKEN;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        $this->render("Gallery", "list", [
            "mediaItems" => array_map(fn($item) => [
                "url" => $item["media_url"],
                "type" => $item["media_type"],
                "caption" => $item["caption"] ?? ""
            ], $data["data"] ?? []),
        ]);
    }
}