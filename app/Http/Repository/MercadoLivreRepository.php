<?php

namespace App\Http\Repository;

use App\Http\Services\MercadoLivreService;

class MercadoLivreRepository
{
    public function __construct(
       private MercadoLivreService $mercadoLivreService
    )
    {}

}
