<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class MedicineController
{
    public function index(Request $request){
        $search = $request->input('search', '');
        $categ = $request->input('category_id', '');
        $medicines = Medicine::where('title', 'like', "%" . $search . "%")
            ->when($categ != '', function ($q) use($categ) { $q->where('category_id', '=', $categ); })
            ->get();

        $categories = Category::all();
        return view('medicine.index', compact('medicines', 'categories', 'categ', 'search'));
    }

   public function create()
   {
        $categories = Category::all();
        return view('medicine.create', compact('categories'));

   }

   public function store()
   {
        $data = request()->validate([
            'title' => 'string',
            'medicine_content' => 'string',
            'image' => 'string',
            'price' => 'integer',
            'count' => 'integer',
            'category_id' => 'integer',
        ]);
        Medicine::create($data);
        return redirect()->route('medicine.index');
   }

    public function show($id)
    {
        $medicines = Medicine::findOrFail($id);
        return view('medicine.show', compact('medicines'));
    }

    public function edit(Medicine $medicine)
    {
        $categories = Category::all();
        return view('medicine.edit', compact('categories', 'medicine'));
    }

    public function update(Medicine $medicine)
    {
        $data = request()->validate([
            'title' => 'string',
            'medicine_content' => 'string',
            'image' => 'string',
            'price' => 'integer',
            'count' => 'integer',
            'category_id' => 'integer',
        ]);
        $medicine->update($data);
        return redirect()->route("medicine.show", $medicine->id);
    }

    public function delete()
    {
        $medicine = Medicine::find(2);
        $medicine->delete();
        dd('deleted');
    }

    public function destroy(Medicine $medicine)
    {
        $medicine->delete();
        return redirect()->route('medicine.index');
    }
 

}