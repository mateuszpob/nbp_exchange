<?php
namespace App\Currency;

use App\Models\Currency;

interface CurrencyRepositoryInterface
{
    public function findByCode(String $code): ?Currency;
}
