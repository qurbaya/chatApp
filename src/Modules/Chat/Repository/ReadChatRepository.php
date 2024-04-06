<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Repository;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

final readonly class ReadChatRepository
{


    public function list(int $authId): Collection
    {
        return Message::where('receiver_id', $authId)
            ->orWhere('sender_id', $authId)
            ->latest()
            ->get();

    }

    public function show(int $senderId, int $receiverId): Collection
    {
        return Message::query()
            ->where(fn($q) => $q
                      ->where('sender_id', $senderId)
                      ->where('receiver_id', $receiverId))
            ->orWhere(fn($q) => $q
            ->where('sender_id', $receiverId)
            ->where('receiver_id', $senderId))
            ->latest()
            ->get();
    }
}
