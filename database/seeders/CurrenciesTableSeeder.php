<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesTableSeeder extends Seeder
{
    protected $currencies = ['Доллары', 'Теньге', 'Рубли'];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->currencies as $currency) {
            Currency::create([
                'name' => $currency,
            ]);
        }
    }
}
