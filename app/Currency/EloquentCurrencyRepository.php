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
}
