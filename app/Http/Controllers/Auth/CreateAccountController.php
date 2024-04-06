<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Modules\Auth\Command\CreateSmsCodeCommand;
use Modules\Modules\Auth\Command\CreateSmsCodeHandler;
use Modules\Modules\Auth\Command\CreateUserCommand;
use Modules\Modules\Auth\Command\CreateUserHandler;
use Modules\Modules\Auth\Command\VerifySmsCodeCommand;
use Modules\Modules\Auth\Command\VerifySmsCodeHandler;

class CreateAccountController extends Controller
{

    public function signUp(Request $request, CreateSmsCodeHandler $handler): \Illuminate\Http\JsonResponse
    {
        $handler->handle(
            new CreateSmsCodeCommand($request->get('phone'))
        );

        return response()->json([
            'message' => 'Успешно'
        ]);
    }

    public function verifyPhone(Request $request, VerifySmsCodeHandler $handler): \Illuminate\Http\JsonResponse
    {
        $handler->handle(new VerifySmsCodeCommand(
                $request->get('phone'),
                (int)$request->get('code')
        ));

        return response()->json([
            'message' => 'Успешно'
        ]);
    }

    public function createUserAccount(Request $request, CreateUserHandler $handler): \Illuminate\Http\JsonResponse
    {
        $handler->handle(
            new CreateUserCommand(
                $request->get('phone'),
                $request->get('name'),
                $request->get('password')
            )
        );

        return response()->json([
            'message' => 'Успешно'
        ]);
    }
}
