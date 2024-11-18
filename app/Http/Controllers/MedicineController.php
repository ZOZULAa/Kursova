<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class MedicineController
{
    public function index(Request $request){
        $categ = $request->input('category_id', '');
        $medicines = Medicine::when($categ != '', 
                function ($q) use($categ) { $q->where('category_id', '=', $categ); })
            ->get();

        $categories = Category::all();
        return view('medicine.index', compact('medicines', 'categories', 'categ'));
    }

   public function create()
   {
        $categories = Category::all();
        return view('medicine.create', compact('categories'));

   }

   public function store()
   {
        $data = request()->validate([
            'title' => 'required|string|max:255',
            'medicine_content' => 'required|string', 
            'image' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'count' => 'required|integer|min:1',
            'category_id' => 'required|integer|exists:categories,id', 
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
            'title' => 'required|string|max:255',
            'medicine_content' => 'required|string', 
            'image' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'count' => 'required|integer|min:1',
            'category_id' => 'required|integer|exists:categories,id', 
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