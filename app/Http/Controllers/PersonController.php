<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Person;


class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show() {
        $person = Person::all();

        if($person->isEmpty())
            return response()->json(['message' => "No records available"], 200);

            return response()->json($person, 200);
    }
    /**
     * Store a newly created resource in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->only('name');

        // validate the request
        $validate = Validator::make($data, [
            'name' => 'required|string'
        ]);

        if ($validate->fails()) {
            return response()->json(['message' => $validate->messages()], 200);
        }

        // check if already present
        if(!Person::where('name', $request->name)->get()->isEmpty())
            return response()->json(['message' => "User with name: $request->name already exists"], 200);

        // create the person object
        $person = Person::create([
            'name' => $request->name
        ]);

        // return newly created object
        return response()->json([
            'message' => 'new person name saved successfully',
            'data' => $person
        ], 201);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Person  $person
     * @return \Illuminate\Http\Response
     */
    public function find(string $name){
        $person = Person::where('name', $name)->get();

        if($person->isEmpty())
            return response()->json(['message' => "No record found"], 200);

        return response()->json($person, 200);
    }
    
}
