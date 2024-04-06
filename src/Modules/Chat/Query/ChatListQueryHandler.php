<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Query;

use Illuminate\Database\Eloquent\Collection;
use Modules\Modules\Chat\Repository\ReadChatRepository;
final readonly class ChatListQueryHandler
{


    public function __construct(private ReadChatRepository $repository
    )
    {
    }

    public function handle(ChatListQuery $query): Collection
    {
        return $this->repository->list($query->getAuthId());
    }
}
