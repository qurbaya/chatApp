<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

final readonly class VerifySmsCodeCommand
{

    public function __construct(private string $phone, private int $code)
    {
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }
}
