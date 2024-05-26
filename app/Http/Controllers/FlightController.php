<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
{
    // Get the current logged in user's ID
    $user_id = auth()->user()->id ?? null;

    // Get only the projects created by the current user
   $flight = Flight::where('user_id', $user_id)
                        ->orderBy('id')
                        ->get();

    return inertia('Flight', ['flight' =>$flight]);
}

    public function create()
    {
        return inertia("Create");
    }

    public function store(Request $request)
    {
    $request->validate([
        'imageUrl' => 'required',
        'name' => 'required',
        'description' => 'required'

    ]);

    $user_id = auth()->user()->id ?? null;
    $request->merge(['user_id' => $user_id]);

    Flight::create($request->all());
    return redirect('/flight');
    }

    public function destroy(Flight $flight)
    {
       $flight->delete();

        return redirect('/flight')->with('success', 'Flight deleted successfully.');
    }

    public function edit(Flight $flight)
    {
        return inertia('Edit', ['flight' =>$flight]);
    }

    public function update(Request $request, Flight $flight)
    {
        $fields = $request->validate([
            'imageUrl' => 'required',
            'name' => 'required',
            'description' => 'required',
            

        ]);

       $flight->update($fields);

        return redirect('/flight')->with('success', 'Flight updated');
    }
}
