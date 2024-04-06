<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Query;

final readonly class ChatShowQuery
{

    public function __construct(private int $senderId, private int $receiverId)
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
}

