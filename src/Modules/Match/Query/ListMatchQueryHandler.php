<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Query;

use Illuminate\Database\Eloquent\Collection;
use Modules\Modules\Match\Repository\ReadReactionRepository;

class ListMatchQueryHandler
{

    public function __construct(private ReadReactionRepository $repository)
    {
    }

    public function handle(ListMatchQuery $query): Collection
    {
        return $this->repository->matches($query->getUserId());
    }
}
