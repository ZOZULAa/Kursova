<?php

namespace App\Http\Controllers;

    class DrugController extends Controller
{
       public function show(string $id): View
    {  
            return view('user.profile', [
                'user' => User::findOrFail($id)
            ]);
    }
}

