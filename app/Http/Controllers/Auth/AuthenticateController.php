<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\MercadoLivreService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateController extends Controller
{
    public function __construct(
        private MercadoLivreService $mercadoLivreService
    )
    {}

    /**
     * Display the login view.
     */
    public function create()
    {
        return view('pages.auth.login.index');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->remember = $request->remember == 'on';
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('dashboard.index')->with(['success' => 'Logado com sucesso!']);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function accessToken()
    {
        dd($this->mercadoLivreService->accessToken(config()));
    }
}
