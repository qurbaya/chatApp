<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

use Illuminate\Support\Facades\Cache;
use Modules\Modules\Auth\Repository\ReadUserRepository;

final readonly class VerifySmsCodeHandler
{

    public function handle(VerifySmsCodeCommand $command): void
    {
        if (!$cache = Cache::get("signUp#" . $command->getPhone())) {
            throw new \DomainException('System error');
        }

        if ($cache !== $command->getCode()) {
            throw new \DomainException('Error code');
        }

        Cache::put('verified#' . $command->getPhone(), ['date' => now()], 600);
    }
}
