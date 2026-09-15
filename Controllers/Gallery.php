<?php

final class Gallery extends Controller {
    final public const GALLERY = "gallery";

    private const URL = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=IGQWRQWWpMWHlrS0cxRHAzdm5lTERjaGptQloyVUJYYVlEQVA5MXZA2OGgtLWYzTnphZA19MUTRsRlNqV3VDbGRjaEJPYU1GZA0RCamxTRmtsVk5OWWxWVWhrczMwYUVDSVdLZA21YNE1rUmN3bmNsUE1TNkVzZAjlZAM0kZD";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::GALLERY);
    }

    public function route(): void {
        switch ($this->action) {
            case self::GALLERY:
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, self::URL);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($ch);
                curl_close($ch);
                $data = json_decode($response, true);

                $this->render([
                    "mediaItems" => array_map(fn($item) => [
                        "url" => $item["media_url"],
                        "type" => $item["media_type"],
                        "caption" => $item["caption"] ?? ""
                    ], $data["data"] ?? []),
                ]);
                break;
            default:
                self::redirect();
                break;
        }
    }
}