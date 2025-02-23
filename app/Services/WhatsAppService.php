<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $apiUrl;
    protected $accessToken;
    protected $phoneId;

    public function __construct()
    {
        $this->apiUrl = env('WHATSAPP_API_URL');
        $this->accessToken = env('WHATSAPP_ACCESS_TOKEN');
        $this->phoneId = env('WHATSAPP_PHONE_ID');
    }

    public function sendMessage($phone, $message)
    {
        $url = "{$this->apiUrl}{$this->phoneId}/messages";

        $response = Http::withToken($this->accessToken)->post($url, [
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $phone,
            "type" => "text",
            "text" => ["body" => $message]
        ]);

        return $response->json();
    }
}

