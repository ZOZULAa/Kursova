<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Препарати для кожної категорії
        $medicinesByCategory = [
            'Анальгетики' => [
                [
                    'title' => 'Анальгін',
                    'medicine_content' => 'Знеболюючий та протизапальний засіб.',
                    'price' => 30.00,
                    'count' => 100,
                    'is_published' => true,
                ],
            ],
            'Антибіотики' => [
                [
                    'title' => 'Амоксицилін',
                    'medicine_content' => 'Антибіотик широкого спектру дії.',
                    'price' => 120.50,
                    'count' => 200,
                    'is_published' => true,
                ],
            ],
            'Антидоти' => [
                [
                    'title' => 'Унітіол',
                    'medicine_content' => 'Антидот для лікування отруєнь важкими металами.',
                    'price' => 300.00,
                    'count' => 50,
                    'is_published' => true,
                ],
            ],
            'Антисептики' => [
                [
                    'title' => 'Хлоргексидин',
                    'medicine_content' => 'Антисептичний розчин для зовнішнього застосування.',
                    'price' => 50.00,
                    'count' => 150,
                    'is_published' => true,
                ],
            ],
            'Вакцини' => [
                [
                    'title' => 'БЦЖ',
                    'medicine_content' => 'Вакцина для профілактики туберкульозу.',
                    'price' => 450.00,
                    'count' => 30,
                    'is_published' => true,
                ],
            ],
            'Діуретики' => [
                [
                    'title' => 'Фуросемід',
                    'medicine_content' => 'Діуретик для лікування набряків.',
                    'price' => 70.00,
                    'count' => 80,
                    'is_published' => true,
                ],
            ],
            'Комбіновані ліки' => [
                [
                    'title' => 'Пенталгін',
                    'medicine_content' => 'Знеболюючий препарат з комбінованим складом.',
                    'price' => 100.00,
                    'count' => 120,
                    'is_published' => true,
                ],
            ],
            'Лікарські форми' => [
                [
                    'title' => 'Активоване вугілля',
                    'medicine_content' => 'Сорбент у формі таблеток.',
                    'price' => 20.00,
                    'count' => 300,
                    'is_published' => true,
                ],
            ],
            'Наркотики' => [
                [
                    'title' => 'Морфін',
                    'medicine_content' => 'Знеболюючий препарат для важких станів.',
                    'price' => 500.00,
                    'count' => 20,
                    'is_published' => false,
                ],
            ],
            'Нейролептики' => [
                [
                    'title' => 'Галоперидол',
                    'medicine_content' => 'Препарат для лікування психічних розладів.',
                    'price' => 150.00,
                    'count' => 60,
                    'is_published' => true,
                ],
            ],
            'Противірусні препарати' => [
                [
                    'title' => 'Осельтамівір',
                    'medicine_content' => 'Противірусний препарат для лікування грипу.',
                    'price' => 350.00,
                    'count' => 70,
                    'is_published' => true,
                ],
            ],
            'Спазмолітики' => [
                [
                    'title' => 'Но-шпа',
                    'medicine_content' => 'Ефективний спазмолітик.',
                    'price' => 80.00,
                    'count' => 120,
                    'is_published' => true,
                ],
            ],
            'Транквілізатори' => [
                [
                    'title' => 'Діазепам',
                    'medicine_content' => 'Препарат для зняття тривоги та напруги.',
                    'price' => 200.00,
                    'count' => 40,
                    'is_published' => true,
                ],
            ],
        ];

        // Знаходимо категорії у базі даних
        foreach ($medicinesByCategory as $categoryTitle => $medicines) {
            $category = Category::where('title', $categoryTitle)->first();

            if ($category) {
                foreach ($medicines as $medicine) {
                    $medicine['category_id'] = $category->id;
                    Medicine::create($medicine);
                }
            }
        }
    }
}
