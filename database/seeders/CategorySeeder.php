<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Анальгетики',
            'Антибіотики',
            'Антидоти',
            'Антисептики',
            'Вакцини',
            'Діуретики',
            'Комбіновані ліки',
            'Лікарські форми',
            'Наркотики',
            'Нейролептики',
            'Противірусні препарати',
            'Спазмолітики',
            'Транквілізатори',
        ];
        foreach ($categories as $category) {
            Category::create([
                'title' => $category
            ]);
        }
    }
}
