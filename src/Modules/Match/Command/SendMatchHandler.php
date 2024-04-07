<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Command;

use Modules\Services\Amqp\RabbitMQService;

final readonly class SendMatchHandler
{

    public function __construct(private RabbitMQService $service)
    {
    }

    public function handle(SendMatchCommand $command): void
    {
        $this->service->publish('matchSend',json_encode(
            [
                'userId'        => $command->getUserId(),
                'receiverId'    => $command->getReceiverId()
            ]
        ));
    }
}
