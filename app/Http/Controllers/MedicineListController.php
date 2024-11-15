<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class MedicineListController
{

    public function index(Request $request){
        $search = $request->input('search', '');
        $medicines = Medicine::where('title', 'like', "%" . $search . "%")->get();
        return view('medicineList.index', compact('medicines'));
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
