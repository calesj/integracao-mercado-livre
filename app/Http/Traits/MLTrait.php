<?php

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
