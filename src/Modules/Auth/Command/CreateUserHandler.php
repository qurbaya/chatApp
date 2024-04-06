<?php

declare(strict_types=1);

namespace Modules\Modules\Auth\Command;

use Illuminate\Support\Facades\Cache;
use Modules\Modules\Auth\Repository\WriteUserRepository;

final readonly class CreateUserHandler
{

    public function __construct(private WriteUserRepository $repository)
    {
    }

    public function handle(CreateUserCommand $command): void
    {
        if (!Cache::get("verified#" . $command->getPhone())) {
            throw new \DomainException('System error');
        }

        Cache::forget("verified#" . $command->getPhone());

        $this->repository->add(
            $command->getPhone(),
            $command->getName(),
            $command->getPassword()
        );
    }
}
