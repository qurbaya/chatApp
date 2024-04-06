<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChatListResource extends JsonResource
{

    private static int $authId;

    public static function collections(mixed $resource, int $authId): AnonymousResourceCollection
    {
        self::$authId = $authId;
        return parent::collection($resource);
    }

    public function toArray(Request $request): array
    {
        $chatInfo = $this->sender['id'] !== self::$authId ? $this->sender : $this->receiver;

         return [
             'id'           => $this->id,
             'chatInfo'     => $chatInfo,
             'message'      => $this->message,
             'sender'       => $this->sender,
             'receiver'     => $this->receiver,
             'created_at'   => $this->created_at
         ];
    }
}
