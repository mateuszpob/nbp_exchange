<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class NbpExchangeService implements ExchangeServiceInterface {
    public function __construct(private String $apiUrl)
    {

    }

    public function loadExchange(): ?array
    {
        try {
            $response = Http::get($this->apiUrl);
            if(!empty($response[0]['rates']))
            {
                return $response[0]['rates'];
            }
            Log::error("No data");
            return null;

        } catch(\Illuminate\Http\Client\ConnectionException $exception) {
            Log::error('Connection error. ' . $exception->getMessage());
            return null;
        } catch (Throwable $throwable) {
            Log::error('Error. ' . $throwable->getMessage());
            return null;
        }
    }
}
