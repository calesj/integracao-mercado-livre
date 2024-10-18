<?php
/*
 * Este código foi desenvolvido como parte de um processo seletivo.
 * Desenvolvido por Cales Junes em Outubro de 2024.
 * Todos os direitos reservados. Este código não pode ser reutilizado ou distribuído sem permissão.
 */


namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Services\MercadoLivreService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private readonly Request $request,
        private readonly MercadoLivreService $mercadoLivreService
    )
    {}

    /**
     * Display a listing of the resource.
     * @throws ConnectionException
     */
    public function index(): View
    {
        $user = $this->request->user();
        $items = $this->mercadoLivreService->getPublisheds($user->ml_user_id)['results'];

        $publisheds = [];
        if (!empty($items)) {
            foreach ($items as $product) {
                $publisheds[] = $this->mercadoLivreService->getPublish($product);
            }
        }

        return view('pages.products.index', compact('user', 'publisheds'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws ConnectionException
     */
    public function create(): View
    {
        $user = $this->request->user();
        $listingTypes = $this->mercadoLivreService->getListingTypes();
        return view('pages.products.create', compact('user', 'listingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request): RedirectResponse
    {
        try {
            /** Categoria sugestiva para o produto */
            $category = $this->mercadoLivreService->suggestCategory($request->title)[0];

            /** Dados do produto **/
            $response = $this->mercadoLivreService->publishProduct($request->validated(), $category);

            /** Lidar com a resposta */
            if (!empty($response['error'])) {
                return redirect()->back()->with(['error' => $response['error']]);
            }

            return redirect()->back()->with('success', 'Publicado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => "Erro desconhecido aconteceu!"]);
        }
    }
}
