<?php

namespace App\Models\Transactions;

use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

class Transaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency_id',
        'amount',
        'email',
        'phone',
        'begin_card',
        'end_card',
        'link',
        'status'
    ];
    
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    
    /**
    * Set begin card.
    *
    * @return string
    */
   public static function setBeginCard($card)
   {
       $card = str_replace(' ', '', $card);
       
       return substr($card, 0, 6);
   }
   
   /**
    * Set end card.
    *
    * @return string
    */
   public static function setEndCard($card)
   {
       $card = str_replace(' ', '', $card);
       
       return substr($card, -4);
   }
}
