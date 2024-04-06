<?php

declare(strict_types=1);

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ChatShowRequest;
use App\Http\Requests\Chat\ChatStoreRequest;
use App\Http\Resources\Chat\ChatListResource;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Modules\Chat\Command\CreateChatCommand;
use Modules\Modules\Chat\Command\CreateChatHandler;
use Modules\Modules\Chat\Query\ChatListQuery;
use Modules\Modules\Chat\Query\ChatListQueryHandler;
use Modules\Modules\Chat\Query\ChatShowQuery;
use Modules\Modules\Chat\Query\ChatShowQueryHandler;

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

    public function show(ChatShowRequest $request, ChatShowQueryHandler $handler): Collection
    {
        return $handler->handle(new ChatShowQuery(
            auth()->id(),
            (int)$request->get('receiverId')
        ));
    }

    public function store(ChatStoreRequest $request, CreateChatHandler $handler): JsonResponse
    {
        $handler->handle(new CreateChatCommand(
            auth()->id(),
            $request->get('receiverId'),
            $request->get('message')
        ));

        return response()->json([
            'message' => 'Успешно'
        ]);
    }
}
