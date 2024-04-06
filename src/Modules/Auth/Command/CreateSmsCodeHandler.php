<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

use Illuminate\Support\Facades\Cache;
use Modules\Modules\Auth\Repository\ReadUserRepository;

final readonly class CreateSmsCodeHandler
{

    public function __construct(private ReadUserRepository $repository)
    {
    }

    public function handle(CreateSmsCodeCommand $command): void
    {
        if ($this->repository->isPhoneExists($command->getPhone())) {
            throw new \DomainException('Phone is exists');
        }

        $verifyCode = 123456; //random_int(111111,999999);

        Cache::put("signUp#" . $command->getPhone(), $verifyCode,600);
    }
}
