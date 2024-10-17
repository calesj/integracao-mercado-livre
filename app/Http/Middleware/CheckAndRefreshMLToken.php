<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class CheckAndRefreshMLToken
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     * @throws Exception
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        /** Verifica se o usuário está autenticado e tem o token do Mercado Livre */
        if ($user->ml_access_token && $user->ml_token_expires_at) {
            /** Verifica se o token expirou */
            if ((now()->addHours(2))->greaterThan($user->ml_token_expires_at)) {
                /** Lógica para renovar o token */
                $newTokens = $this->refreshAccessToken($user->ml_refresh_token);

                /** Atualiza o access_token e a data de expiração */
                $user->ml_access_token = $newTokens['access_token'];
                $expiresAt = now()->addSeconds($newTokens['expires_in'])->format('Y-m-d H:i:s');
                $user->ml_token_expires_at = $expiresAt;
                $user->ml_token_expires_at = now()->addSeconds();
                $user->save();
            }
        }

        return $next($request);
    }

    // Lógica para renovar o token usando o refresh_token

    /**
     * @throws Exception
     */
    private function refreshAccessToken($refreshToken)
    {
        $appId = config('mercadolivre.client_id');
        $clientSecret = config('mercadolivre.client_secret');
        $url = "https://api.mercadolibre.com/oauth/token";

        $data = [
            'grant_type' => 'refresh_token',
            'client_id' => $appId,
            'client_secret' => $clientSecret,
            'refresh_token' => $refreshToken,
        ];

        $response = Http::post($url, $data);

            return $response->json();

    }
}
