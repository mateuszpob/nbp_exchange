<?php

namespace App\Http\Controllers;

use App\Services\ExchangeServiceInterface;

class NbpController extends Controller
{
    public function updateExchanges(ExchangeServiceInterface $service)
    {

        return $service->loadExchange();
    }
}










