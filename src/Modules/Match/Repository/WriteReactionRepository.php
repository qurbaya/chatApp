<?php

declare(strict_types=1);

namespace Modules\Modules\Match\Repository;

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
}
