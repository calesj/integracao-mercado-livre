<?php
/*
 * Este código foi desenvolvido como parte de um processo seletivo.
 * Desenvolvido por Cales Junes em Outubro de 2024.
 * Todos os direitos reservados. Este código não pode ser reutilizado ou distribuído sem permissão.
 */


namespace App\Http\Traits;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

trait MLTrait
{
    /**
     * @throws ConnectionException
     */
    public function request(string $url, string $method = 'GET', array $data = [], array $headers = [])
    {
        return match ($method) {
            'GET' | 'get' => Http::withHeaders($headers)->get($url, $data)->json(),
            'POST' | 'post' => Http::withHeaders($headers)->post($url, $data)->json(),
            default => false,
        };
    }
}
