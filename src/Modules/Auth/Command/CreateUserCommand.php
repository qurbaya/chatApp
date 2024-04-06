<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

final readonly class CreateUserCommand
{

    public function __construct(private string $phone,
                                private string $name,
                                private string $password)
    {
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
