<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

final readonly class CreateSmsCodeCommand
{

    public function __construct(private string $phone)
    {
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
