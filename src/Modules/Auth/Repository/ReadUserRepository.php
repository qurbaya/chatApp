<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Repository;

use App\Models\User;

final readonly class ReadUserRepository
{

    public function isPhoneExists(string $phone): bool
    {
        return User::wherePhone($phone)->exists();
    }
}
