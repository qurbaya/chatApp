<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\ChatListResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Modules\Chat\Command\CreateChatCommand;
use Modules\Modules\Chat\Command\CreateChatHandler;
use Modules\Modules\Chat\Query\ChatListQuery;
use Modules\Modules\Chat\Query\ChatListQueryHandler;

class ChatController extends Controller
{

    public function list(ChatListQueryHandler $handler): AnonymousResourceCollection
    {
        $authId = auth()->id();

        return ChatListResource::collections(
            $handler->handle(
                new ChatListQuery($authId)
            ),
            $authId
        );
    }

    public function store(Request $request, CreateChatHandler $handler): void
    {
        $handler->handle(new CreateChatCommand(
            auth()->id(),
            $request->get('receiverId'),
            $request->get('message')
        ));
    }
}
