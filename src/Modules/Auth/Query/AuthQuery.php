<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Query;

final readonly class AuthQuery
{

    public function __construct(
        private string $phone,
        private string $password,
    )
    {
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
