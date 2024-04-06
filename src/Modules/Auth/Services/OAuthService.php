<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Services;

use Illuminate\Http\Request;

final readonly class OAuthService
{


    public function oauth(string $email, string $password, int $clientId, string $clientSecret): array
    {
        $params = [
            'grant_type' => 'password',
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'username' => $email,
            'password' => $password,
            'scope' => '',
        ];

        $response = app()->handle(
            Request::create('/api/oauth/token', 'POST', $params)
        );

        if (!$response->isSuccessful()) {
            throw new \Exception('System Error');
        }

        return json_decode($response->getContent(), true);
    }
}
