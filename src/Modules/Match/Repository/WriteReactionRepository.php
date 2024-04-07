<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Repository;

use App\Models\MatchUser;
use App\Models\Reaction;

final readonly class WriteReactionRepository
{

    public function add(int $userId, int $receiverId, string $reaction): void
    {
        $model = new Reaction();
        $model->user_id         = $userId;
        $model->receiver_id     = $receiverId;
        $model->reaction        = $reaction;

        $model->save();
    }

    public function addMatch(int $userId, int $receiverId): void
    {
        $match = new MatchUser();
        $match->user_id = $userId;
        $match->receiver_id = $receiverId;

        $match->save();

        Reaction::whereUserId($receiverId)
                  ->whereReceiverId($userId)
                  ->delete();
    }
}
