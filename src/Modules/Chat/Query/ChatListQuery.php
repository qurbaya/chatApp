<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Query;

final readonly class ChatListQuery
{
    public function __construct(private int $authId)
    {
    }

    public function getAuthId(): int
    {
        return $this->authId;
    }

}
