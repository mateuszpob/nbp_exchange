<?php

namespace App\Services;

use App\Currency\CurrencyRepositoryInterface;

class CurrencyService {
    public function __construct(private ExchangeServiceInterface $nbpService, private CurrencyRepositoryInterface $currencyRepository)
    {

    }

    public function updateExchange()
    {
        $exchangeData = $this->getExchangeData();

        if(is_array($exchangeData))
        {
            foreach($exchangeData as $currencyData)
            {
                $currency = $this->currencyRepository->findByCode($currencyData['code']);

                if(is_null($currency))
                {
                    $this->currencyRepository->create($currencyData);
                }
                else
                {
                    $this->currencyRepository->update($currency, $currencyData);
                }
            }
        }

        return $exchangeData;
    }

    private function getExchangeData(): ?array
    {
        return $this->nbpService->loadExchange();
    }
}
