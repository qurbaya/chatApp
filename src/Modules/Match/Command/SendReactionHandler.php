<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Command;

use Modules\Modules\Match\Repository\WriteReactionRepository;
use Modules\Services\Amqp\RabbitMQService;

final readonly class SendReactionHandler
{

    public function __construct(
        private WriteReactionRepository $repository,
        private RabbitMQService $rabbitmq
    )
    {
    }

    public function handle(SendReactionCommand $command): void
    {
        $this->rabbitmq->publish('reaction', json_encode([
            'user_id'       => $command->getAuthId(),
            'receiver_id'   => $command->getReceiverId(),
            'reaction'      => $command->getReaction()
        ]));
    }
}
