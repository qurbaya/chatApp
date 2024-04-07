<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Query;

use Illuminate\Database\Eloquent\Collection;
use Modules\Modules\Match\Repository\ReadReactionRepository;

final readonly class ListLikesQueryHandler
{
    public function __construct(private ReadReactionRepository $repository)
    {
    }

    public function handle(ListLikesQuery $query): Collection
    {
        return $this->repository->likes($query->getUserId());
    }
}
