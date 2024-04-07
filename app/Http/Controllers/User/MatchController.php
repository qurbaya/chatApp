<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\MatchSendRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Modules\Match\Command\SendMatchCommand;
use Modules\Modules\Match\Command\SendMatchHandler;
use Modules\Modules\Match\Query\ListLikesQuery;
use Modules\Modules\Match\Query\ListLikesQueryHandler;
use Modules\Modules\Match\Query\ListMatchQuery;
use Modules\Modules\Match\Query\ListMatchQueryHandler;

class MatchController extends Controller
{

    public function listLikes(ListLikesQueryHandler $handler): JsonResponse
    {
        return response()->json($handler->handle(new ListLikesQuery(auth()->id())));
    }

    public function listMatches(ListMatchQueryHandler $handler): JsonResponse
    {
        return response()->json($handler->handle(new ListMatchQuery(auth()->id())));
    }

    public function send(MatchSendRequest $request, SendMatchHandler $handler): JsonResponse
    {
        $handler->handle(new SendMatchCommand(
            auth()->id(),
            (int)$request->get('receiverId')
        ));

        return response()->json([
            'message' => 'Успешно'
        ]);
    }
}
