<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Query;

use Modules\Modules\Chat\Repository\ReadChatRepository;
use Illuminate\Database\Eloquent\Collection;

final readonly class ChatShowQueryHandler
{


    public function __construct(private ReadChatRepository $repository)
    {
    }

    public function handle(ChatShowQuery $query): Collection
    {
        return $this->repository->show($query->getSenderId(), $query->getReceiverId());
    }
}
