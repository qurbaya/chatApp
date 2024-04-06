<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Repository;

use App\Models\User;

final readonly class WriteUserRepository
{

    public function add(string $phone, string $name, string $password): void
    {
        $user = new User();
        $user->phone = $phone;
        $user->name = $name;
        $user->password = bcrypt($password);

        $user->save();
    }
}
