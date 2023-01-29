<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::upsert(
            [
                ['name' => 'Maszyny do robót ziemnych', 'description' => 'Maszyna robocza, służąca do urabiania gruntów różnej kategorii', 'image' => 'public/images/categories/kCuY7oiM8KncdmAyorROobpzqu8OMUhpt4Dd4GHD.jpg'],
                ['name' => 'Maszyny do kruszyw
                ', 'description' => 'Maszyny przerabiające kruszywa sztuczne i naturalne', 'image' => 'public/images/categories/eWzWd9OSHE6gFjZBDIn0AaGmew5x5M6rPkAt1XRU.jpg'],
                ['name' => 'Narzędzia', 'description' => 'Przedmiot lub urządzenie służące do pracy', 'image' => 'public/images/categories/Ktc0bneQdHoPVVNe6G9yeO45jyML09pAU79dyno3.jpg'],
                ['name' => 'Odzież ochronna', 'description' => 'Rodzaj odzieży chroniącej człowieka podczas pracy', 'image' => 'public/images/categories/J3yIMTz5Ym3cArzzjhD6buhMIVYHVaMq1k3oCQfX.jpg'],
                ['name' => 'Maszyny rolnicze', 'description' => 'Są to maszyny stosowane w rolnictwie', 'image' => 'public/images/categories/LTNx9qfRcVcpoPTBXej8fxe0TG4sFYIdmfvmXoLv.jpg'],
                ['name' => 'Wiertarki', 'description' => 'Urządzenie do wiercenia, rozwiercania', 'image' => 'public/images/categories/2Br5O0RcRwAywcCAHeFlAs579GztBmoMgSVYe3Ew.jpg'],
            ],
            'id'
        );
    }
}
