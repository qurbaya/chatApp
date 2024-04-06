<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Modules\Auth\Query\AuthQuery;
use Modules\Modules\Auth\Query\AuthQueryHandler;

class AuthController extends Controller
{


    /**
     * @throws \Exception
     */
    public function auth(Request $request, AuthQueryHandler $handler): array
    {
        return $handler->handle(
            new AuthQuery($request->get('email'),$request->get('password'))
        );
    }
}
