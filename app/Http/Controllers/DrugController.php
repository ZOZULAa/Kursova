<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;

class DrugController
{
    public function index(){
        $drug = Drug::all();
        return view('drug.index', compact('drug'));
    }

   public function create()
   {
        return view('drug.create');
   }

   public function store()
   {
        $data = request()->validate([
            'title' => 'string',
            'drug_content' => 'string',
            'image' => 'string',
        ]);
        Drug::create($data);
        return redirect()->route('drug.index');
   }

    public function show($id)
    {
        $drug = Drug::findOrFail($id);
        return view('drug.show', compact('drug'));
    }

    public function edit(Drug $drug)
    {
        return view('drug.edit', compact('drug'));
    }

    public function update(Drug $drug)
    {
        $data = request()->validate([
            'title' => 'string',
            'drug_content' => 'string',
            'image' => 'string',
        ]);
        $drug->update($data);
        return redirect()->route("drug.show", $drug->id);
    }

    public function delete()
    {
        $drug = Drug::find(2);
        $drug->delete();
        dd('deleted');
    }

    public function destroy(Drug $drug)
    {
        $drug->delete();
        return redirect()->route('drug.index');
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