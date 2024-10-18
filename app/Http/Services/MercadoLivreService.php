<?php

namespace App\Http\Services;

use App\Http\Const\MLConst;
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
     */
    public function suggestCategory(string $q)
    {
        $url = "https://api.mercadolibre.com/sites/MLB/domain_discovery/search?";
        return $this->request($url, 'get', ['q' => $q, 'limit' => 1]);
    }

    /**
     * @throws ConnectionException
     */
    public function getListingTypes()
    {
        $url = MLConst::LIST_TYPES;
        return $this->request($url, 'get');
    }

    /**
     * @throws ConnectionException
     */
    public function publishProduct(array $params, $category)
    {
        /** Dados do produto **/
        $productData = [
            'title' => $params['title'],
            'category_id' => $category['category_id'],
            'price' => $params['price'],
            'currency_id' => 'BRL',
            'available_quantity' => $params['available_quantity'],
            'buying_mode' => 'buy_it_now', // pode ser alterado conforme necessário
            'condition' => 'new', // pode ser 'new', 'used', etc.
            'listing_type_id' => $params['listing_type_id'],
            'description' => [
                'plain_text' => $params['description'],
            ],
            'attributes' => $category['attributes'],
            'pictures' => array_map(function ($url) {
                return ['source' => $url];
            }, $params['pictures']),
        ];

        return $this->request(MLConst::PUBLISH_ITEM, 'post', $productData, ['Authorization' => 'Bearer ' . auth()->user()->ml_access_token]);
    }

    /**
     * @throws ConnectionException
     */
    public function getPublisheds(string $id)
    {
        $url = "https://api.mercadolibre.com/users/$id/items/search";

        return $this->request($url, 'get', [], ['Authorization' => 'Bearer ' . auth()->user()->ml_access_token]);
    }

    public function getPublish(string $id)
    {
        $url = "https://api.mercadolibre.com/items/$id";

        return $this->request($url, 'get', [], ['Authorization' => 'Bearer ' . auth()->user()->ml_access_token]);
    }
}
