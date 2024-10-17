<?php

namespace App\Http\Controllers;

use App\Http\Services\MercadoLivreService;
use Illuminate\Http\Request;

class MLController extends Controller
{
    public function __construct(
        private readonly MercadoLivreService $mercadoLivreService
    )
    {}

    public function oauth(Request $request)
    {
        $user = $request->user();
        if (!$user->ml_user_id) {
            $mlAuth = $this->mercadoLivreService->oauth();
            $user->ml_user_id = $mlAuth['user_id'];
            $user->refresh_token = $mlAuth['refresh_token'];
            $user->save();
        }

        return redirect();
    }
}
