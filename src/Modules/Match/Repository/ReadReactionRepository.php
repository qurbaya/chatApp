<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Repository;

use App\Models\MatchUser;
use App\Models\Reaction;
use Illuminate\Database\Eloquent\Collection;

class ReadReactionRepository
{

    public function likes(int $userId): Collection
    {
        return Reaction::whereReceiverId($userId)
            ->latest()
            ->get();
    }

    public function matches(int $userId): Collection
    {
        return MatchUser::whereUserId($userId)
                    ->latest()
                    ->get();
    }
}
