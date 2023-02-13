<?php
namespace App\Currency;

use App\Models\Currency;
use App\Currency\CurrencyRepositoryInterface;

class EloquentCurrencyRepository implements CurrencyRepositoryInterface
{
    public function findByCode(String $code): ?Currency
    {
        return Currency::where('currency_code', $code)->first();
    }

    public function create(array $currencyData): Currency
    {
        return Currency::create([
            'name' => $currencyData['currency'],
            'currency_code' => $currencyData['code'],
            'exchange_rate' => $currencyData['mid']
        ]);
    }

    public function update(Currency $currency, array $currencyData): bool
    {
        return $currency->update([
            'name' => $currencyData['currency'],
            'currency_code' => $currencyData['code'],
            'exchange_rate' => $currencyData['mid']
        ]);
    }
}
