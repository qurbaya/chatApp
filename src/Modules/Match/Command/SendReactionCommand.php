<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Command;

final readonly class SendReactionCommand
{

    public function __construct(
        private int $authId,
        private int $receiverId,
        private string $reaction)
    {
    }

    public function getAuthId(): int
    {
        return $this->authId;
    }

    public function getReaction(): string
    {
        return $this->reaction;
    }

    public function getReceiverId(): int
    {
        return $this->receiverId;
    }


}
