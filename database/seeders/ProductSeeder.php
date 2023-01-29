<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::upsert(
            [
                ['name' => 'Rękawice', 'price' => 2.99, 'image' => 'public/images/products/Ahue1jEo7CGKq0yzvlzl8YAxYaID2hrOZ38K5nwy.jpg', 'description' => 'Chronią dłonie pracownika w pracy', 'amount' => 100, 'category_id' => 4],
                ['name' => 'Śrubokręt', 'price' => 14.99, 'image' => 'public/images/products/nm6YdXIKjFUKAnliuwAxC90Sm1arhBLMpaA3nxW8.jpg', 'description' => 'Wąski walec z różnymi końcówkami', 'amount' => 50, 'category_id' => 3],
                ['name' => 'Koparka', 'price' => 500000, 'image' => 'public/images/products/zpVoP06V5kAOemBoMBMadWr1f8ZvAdOGmNy8YUlK.jpg', 'description' => 'Służy do kopania w ziemi', 'amount' => 5, 'category_id' => 1],
                ['name' => 'Przesiewacz', 'price' => 1999.9, 'image' => 'public/images/products/fv6rndcrqL7PCYN2kQt4l1r3hRbnfi98ZbetnyfO.jpg', 'description' => 'Mechanicznie separuje dane minerały', 'amount' => 10, 'category_id' => 2],
                ['name' => 'Prasa', 'price' => 11299.9, 'image' => 'public/images/products/9IyxTLzRh4qhsCIPvSKVAuswXePSG5mqjc1I7Kzc.jpg', 'description' => 'Zwija słomy siana', 'amount' => 20, 'category_id' => 5],
                ['name' => 'Wiertareczka', 'price' => 59.9, 'image' => 'public/images/products/ynsj0gNTXV5Nx7BHHi7HtvJ4wd8yZlHB9EYRLv5f.jpg', 'description' => 'Wierci dziury', 'amount' => 80, 'category_id' => 6],
            ],
            'id'
        );
    }
}
