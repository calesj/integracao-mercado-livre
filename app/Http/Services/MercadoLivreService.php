<?php

namespace App\Http\Services;

use App\Http\Traits\MLTrait;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Http;

class MercadoLivreService
{
    use MLTrait;
    public function oauth(): Application|Redirector|RedirectResponse
    {
        $appId = config('mercadolivre.client_id');
        $redirectUri = config('mercadolivre.redirect_uri');

        $url = "https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=$appId&redirect_uri=$redirectUri";

        return redirect($url);
    }

    /**
     * @throws ConnectionException
     */
    public function accessToken(string $code): array
    {
        $appId = config('mercadolivre.client_id');
        $redirectUri = config('mercadolivre.redirect_uri');

        $url = "https://api.mercadolibre.com/oauth/token";

        $data = [
            'grant_type' => 'authorization_code',
            'client_id' => $appId,
            'client_secret' => config('mercadolivre.client_secret'),
            'code' => $code,
            'redirect_uri' => $redirectUri,
        ];

        $headers = [
            'accept' => 'application/json',
            'content-type' => 'application/x-www-form-urlencoded',
        ];

        return Http::withHeaders($headers)->post($url, $data)->json();
    }

    /**
     * @throws ConnectionException
     * @throws Exception
     */
    public function getCategories()
    {
        $url = 'https://api.mercadolibre.com/sites/MLB/categories/all';

        // Fazer a requisição
        return $this->request($url, 'get');
    }
}
