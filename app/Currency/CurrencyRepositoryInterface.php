<?php
namespace App\Currency;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function findByCode(String $code): ?Currency;
    public function create(array $currencyData): Currency;
    public function update(Currency $currency, array $currencyData): bool;
}
