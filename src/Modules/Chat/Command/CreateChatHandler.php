<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Command;

use Modules\Modules\Chat\Repository\WriteChatRepository;

final readonly class CreateChatHandler
{

    public function __construct(private WriteChatRepository $repository)
    {
    }

    public function handle(CreateChatCommand $command): void
    {
        $this->repository->send(
            $command->getSenderId(),
            $command->getReceiverId(),
            $command->getMessage()
        );
    }
}

