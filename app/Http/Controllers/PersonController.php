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
            return response()->json(['error' => $validate->messages()], 200);
        }

        // check if already present
        if(!Person::where('name', $request->name)->get()->isEmpty())
            return response()->json(['error' => "User with name: $request->name already exists"], 200);

        // create the person object
        $person = Person::create([
            'name' => $request->name
        ]);

        // return newly created object
        return response()->json([
            'status' => 'new person name saved successfully',
            'data' => $person
        ], 201);
    }
    

    
}
