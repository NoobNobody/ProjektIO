<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::upsert(
            [
                ['first_name' => 'Andrzej', 'second_name' => 'Kowalski', 'email' => 'akowalski@gmail.com', 'telephone_number' => '919191919', 'rental_time' => '2022-06-27T12:49'],
                ['first_name' => 'Kasia', 'second_name' => 'Kłos', 'email' => 'kkłos@gmail.com', 'telephone_number' => '333666999', 'rental_time' => '2022-06-26T10:20'],
                ['first_name' => 'Piotr', 'second_name' => 'Jaśkiewicz', 'email' => 'pjaśkiewicz@gmail.com', 'telephone_number' => '123987654', 'rental_time' => '2022-06-28T05:22'],
                ['first_name' => 'Laura', 'second_name' => 'Oleksy', 'email' => 'loleksy@gmail.com', 'telephone_number' => '588591195', 'rental_time' => '2022-06-27T20:15'],
            ],
            'id'
        );
    }
}
