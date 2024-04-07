<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Query;

final readonly class ListMatchQuery
{
    public function __construct(private int $userId)
    {
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
