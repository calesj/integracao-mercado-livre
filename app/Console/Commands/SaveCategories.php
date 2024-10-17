<?php

namespace App\Console\Commands;

use App\Http\Services\MercadoLivreService;
use App\Models\Category;
use App\Models\ChildrenCategory;
use Illuminate\Console\Command;
use Illuminate\Http\Client\ConnectionException;

class SaveCategories extends Command
{
    public function __construct(
        private MercadoLivreService $mercadoLivreService
    )
    {
        parent::__construct();
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ml:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salva algumas categorias do mercado livre';

    /**
     * Execute the console command.
     * @throws ConnectionException
     */
    public function handle(): void
    {
        $max = 15;

        /** Limitando para 20 categorias */
        $categories = array_slice($this->mercadoLivreService->getCategories(), 0, $max);

        foreach ($categories as $categoryData) {
            /** Cria ou atualiza a categoria */
            Category::updateOrCreate(
                [
                    'id' => $categoryData['id'],
                ],
                [
                    'id' => $categoryData['id'],
                    'name' => $categoryData['name'],
                ]
            );
        }
    }
}
