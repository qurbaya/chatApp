<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ReactionRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Modules\Match\Command\SendReactionCommand;
use Modules\Modules\Match\Command\SendReactionHandler;

class ReactionController extends Controller
{

    public function __invoke(ReactionRequest $request, SendReactionHandler $handler): JsonResponse
    {
        $handler->handle(
            new SendReactionCommand(
                auth()->id(),
                (int)$request->get('receiverId'),
                $request->get('reaction')
            )
        );

        return response()->json([
            'message' => 'Успешно'
        ]);
    }
}
