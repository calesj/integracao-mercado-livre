<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Services\MercadoLivreService;
use App\Models\Product;
use Illuminate\Http\Client\ConnectionException;
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
     */
    public function index()
    {
        $user = $this->request->user();


        return view('pages.products.index', compact( 'user'));
    }

    /**
     * Show the form for creating a new resource.
     * @throws ConnectionException
     */
    public function create()
    {
        $user = $this->request->user();
        $listingTypes = $this->mercadoLivreService->getListingTypes();
        return view('pages.products.create', compact('user', 'listingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     * @throws ConnectionException
     */
    public function store(ProductStoreRequest $request)
    {
        /** Categoria sugestiva para o produto */
        $category = $this->mercadoLivreService->suggestCategory($request->title)[0];

        /** Dados do produto **/
        $response = $this->mercadoLivreService->publishProduct($request->validated(), $category);

        /** Lidar com a resposta */
        if (!empty($response['cause'][0])) {
            return redirect()->back()->with(['error' => $response['cause'][0]['message']]);
        }

        return redirect()->back()->with('success', 'Publicado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
