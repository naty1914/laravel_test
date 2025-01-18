<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Models\Dojos;
use App\Models\Ninja;


class NinjaController extends Controller
{
    public function index()
    {
        $Ninjas = Ninja::with('dojo')->orderBy("created_at","desc")->paginate(perPage: 10);
        return view('ninjas.index', ["ninjas" => $Ninjas]);
    }
    public function create()
    {       
        $dojos = Dojos::all();
        return view('ninjas.create',['dojos' => $dojos]);
    }
    public function show(Ninja $ninja)
    {
        $ninja->load('dojo');
        return view('ninjas.show', ['ninja' => $ninja]);
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required | string | max:255',
            'skill' => 'required|integer|min:0|max:100',
            'bio' => 'required | string  | min:20 |max:500',
            'dojos_id' => 'required|exists:dojos,id'
        ]);
       
        Ninja::create($validated);
        return redirect()->route('ninjas.index')->with('success_create', "Ninja : $validated[name] created successfully");

    }

   public function destroy(Ninja $ninja) {
    $ninja->delete();
    return redirect()->route('ninjas.index')->with('success_delete', "Ninja: $ninja->name deleted successfully");
   }
}
