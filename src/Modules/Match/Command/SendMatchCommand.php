<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Command;

final readonly class SendMatchCommand
{

    public function __construct(private int $userId, private int $receiverId)
    {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }
}
