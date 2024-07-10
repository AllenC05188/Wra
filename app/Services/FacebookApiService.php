<?php

namespace App\Services;

use Exception;

class FacebookApiService
{
    protected $accessToken;
    protected $appSecretProof;
    protected $apiVersion;

    public function __construct()
    {
        $this->accessToken = env('USER_PERSONAL_ACCESS_TOKEN');
        $this->appSecretProof = env('APP_SECRET_PROOF');
        $this->apiVersion = env('API_VERSION');
    }

    public function createChildBusinessManager($parentBmId, $id, $name, $vertical = 'OTHER', $sharedPageId = null, $timezoneId = 1)
    {
        $url = "https://graph.facebook.com/{$this->apiVersion}/{$parentBmId}/owned_businesses";

        $formData = [
            'id' => $id,
            'name' => $name,
            'vertical' => $vertical,
            'timezone_id' => $timezoneId,
            'access_token' => $this->accessToken,
            'appsecret_proof' => $this->appSecretProof,
            'page_permitted_tasks' => json_encode(["ADVERTISE", "ANALYZE"])
        ];

        if ($sharedPageId) {
            $formData['shared_page_id'] = $sharedPageId;
        }

        $response = $this->makeCurlRequest($url, $formData);

        return json_decode($response, true);
    }

    protected function makeCurlRequest($url, $formData)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($formData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            throw new Exception('Error: ' . curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }
}
