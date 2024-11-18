<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class MedicineListController
{

    public function index(Request $request){
        $search = $request->input('search', '');
        $categ = $request->input('category_id', '');
        $medicines = Medicine::where('title', 'like', "%" . $search . "%")
            ->when($categ != '', function ($q) use($categ) { $q->where('category_id', '=', $categ); })
            ->get();

        $categories = Category::all();
        return view('medicineList.index', compact('medicines', 'categories', 'categ', 'search'));
    }

    public function show($id){
        $medicines = Medicine::findOrFail($id);
        return view('medicineList.show', compact('medicines'));
    }

    public function store(){
        $data = request()->validate([
            'title' => 'string',
            'medicine_content' => 'string',
            'price' => 'integer',
            'count' => 'integer',
            'category_id' => 'integer',
            'image' => 'string',
        ]);
        Medicine::create($data);
        return redirect()->route('medicineList.show');

        
    }

}
