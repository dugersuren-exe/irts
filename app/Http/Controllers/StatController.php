<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stat;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x=Stat::all();
        return ['stat'=>$x];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $fields=$request->validate([
            'name'=>'required|max:255',
            'abr'=>'required|max:1',
        ]); 
        // if($fields.fails()){
        //     return response()->json([
        //         'message'=>'Error message',
        //         'error'=>$fields->message(),
        //     ]);
        // };
        // $xx=Stat::create([
        //     'name'=>$request->name,
        //     'abr'=>$request->abr,
        // ]);

        return [
            'Response: '=>'dgsdfgsdf',
            'name'=>'Ирсэн хүсэлт '.$request->name,
            'abr'=>$request->abr,
            //'error'=>$fields->message(),
        ];
        //if($fields!=null)return "Error";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $x=Stat::all();
        return ['stat'=>$x];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
