<?php

namespace App\Http\Controllers;

use App\Http\Requests\MLCodeRequest;
use App\Http\Services\MercadoLivreService;
use App\Models\Category;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;

class MLController extends Controller
{
    public function __construct(
        private readonly MercadoLivreService $mercadoLivreService
    )
    {}

    public function oauth()
    {
        return $this->mercadoLivreService->oauth();
    }

    /**
     * Retorna as categorias, e as categorias filhas
     */
    public function categories()
    {
        return Category::with('childCategories')->get();
    }

    /**
     * @throws ConnectionException
     */
    public function accessToken(MLCodeRequest $request, string $code)
    {
        $user = $request->user();
        if (!$user->ml_user_id) {
            $mlAuth = $this->mercadoLivreService->accessToken($code);
            $user->ml_user_id = $mlAuth['user_id'];
            $user->ml_refresh_token = $mlAuth['refresh_token'];
            $user->save();
        }

        return redirect()->route('dashboard.index');
    }
}
