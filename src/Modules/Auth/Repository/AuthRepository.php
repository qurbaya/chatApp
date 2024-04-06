<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Repository;

use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client;

final readonly class AuthRepository
{

    public function find(string $email, string $password): bool
    {
        return Auth::attempt(['email' => $email, 'password' => $password]);
    }

    public function passportClient()
    {
        return Client::where('password_client', 1)->firstOrFail();
    }
}
