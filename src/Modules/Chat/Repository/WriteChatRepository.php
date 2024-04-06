<?php

declare(strict_types=1);

namespace Modules\Modules\Chat\Repository;

use App\Models\Message;
use Illuminate\Support\Facades\DB;

final readonly class WriteChatRepository
{

    public function send(int $senderId, int $receiverId, string $message): void
    {
       Message::create([
           'sender_id'      => $senderId,
           'receiver_id'    => $receiverId,
           'message'        => $message
       ]);
    }
}
