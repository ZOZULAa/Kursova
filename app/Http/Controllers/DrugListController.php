<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugListController
{
    public function index(){
        $drug = Drug::find(1);
        dd($drug);
    }

    public function create()
    {
        $drugsArr =
        [
            [
                'title' => 'title of port from phpstorm',
                'content' => 'some interesting content',
                'image' => 'imagebababuy.jpg',
                'is_published' =>1, 
            ],
            [
                'title' => 'another title of port from phpstorm',
                'content' => 'another some interesting content',
                'image' => 'another imagebababuy.jpg',
                'is_published' =>1, 
            ], 
        ];

        foreach ($drugsArr as $item)
        {
            Drug::create([
                'title' => $item['title'],
                'content' => $item['content'],
                'image' => $item['image'],
                'is_published' =>$item['is_published'],
            ]);
        
        }

    }

    public function update()
    {
        $drug = Drug::findOrFail(7);

        $drug->update([
                'title' => 'qwertyu',
                'content' => 'asdfgh',
                'image' => 'zxcvbn',
                'is_published' => 0,
                dd('Updated')
        ]);

    }

    public function delete()
    {
        $drug = Drug::find(2);
        $drug->delete();
        dd('deleted');
    }
}
/*
    public function delete()
    {
        $drug = Drug::withTrashed->find(2);
        $drug->restore();
        dd('deleted');
    }
}
*/



/*
$drug = Drug::where('is_published', 0)->first();
foreach ($drugs as $drug) {
    dump($drug->title);
}
dd('end');
*/