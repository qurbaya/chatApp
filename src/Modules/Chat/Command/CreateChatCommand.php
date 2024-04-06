<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Command;

final readonly class CreateChatCommand
{

    public function __construct(
        private int $senderId,
        private int $receiverId,
        private string $message
    )
    {
    }

    public function getSenderId(): int
    {
        return $this->senderId;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
