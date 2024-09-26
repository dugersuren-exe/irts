<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{

    public function index()
    {
        $datas=Teacher::all();
        return $datas;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validator=$request->validate([
            'firstName'=>'required|max:255',
            'lastName'=>'required|max:255',
            'gender'=>'required',
            'phoneNumber'=>'required',
            'lesson'=>'required',
        ]);

        if($validator->fails()) return "Error";
        
        $t= Teacher::create($validator);

        return $t;
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
        //return 'id='.$id;
        $t=Teacher::findOrFail($id);
        return $t;
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
