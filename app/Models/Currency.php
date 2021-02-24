<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Models\Transactions\Transaction;

class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
    
    public static function getCurrencyList()
    {
        return Arr::pluck(Currency::select('id', 'name')
                ->get()
                ->toArray(), 
                'name', 'id'
            );
    }
}
