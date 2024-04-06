<?php

namespace App\Http\Controllers;

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
