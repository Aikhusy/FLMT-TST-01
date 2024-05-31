<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;
    protected $table='stocks';

    protected $fillable = [
        'stock_symbol',
        'company_name',
        'quantity',
        'purchase_price',
        'current_price',
        'purchase_date',
        'market',
        'sector',
        'industry',
        'dividend_yield',
        'earnings_per_share',
        'price_earnings_ratio',
    ];
}
