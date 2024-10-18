<?php

namespace App\Http\Controllers;

use App\Http\Requests\MLCodeRequest;
use App\Http\Services\MercadoLivreService;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;

class MLController extends Controller
{
    public function __construct(
        private readonly MercadoLivreService $mercadoLivreService
    )
    {}

    public function oauth(): RedirectResponse
    {
        return $this->mercadoLivreService->oauth();
    }

    /**
     * @throws ConnectionException
     */
    public function accessToken(MLCodeRequest $request, string $code): RedirectResponse
    {
        $user = $request->user();

        if (!$user->ml_user_id) {
            $expiresAt = now()->addSeconds(21600)->format('Y-m-d H:i:s');
            $mlAuth = $this->mercadoLivreService->accessToken($code);
            $user->ml_user_id = $mlAuth['user_id'];
            $user->ml_refresh_token = $mlAuth['refresh_token'];
            $user->ml_access_token = $mlAuth['access_token'];
            $user->ml_token_expires_at = $expiresAt;
            $user->save();
        }

        return redirect()->route('dashboard.index');
    }
}
