<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Repository;

use App\Models\Message;

final readonly class ReadChatRepository
{


    public function list(int $authId)
    {
        return Message::where('receiver_id', $authId)
            ->orWhere('sender_id', $authId)
            ->latest()
            ->get();

    }
}
