<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=$request->validate([
            'course_id'=>'required',
            'firstName'=>'required|max:100',
            'lastName'=>'required|max:100',
            'gender'=>'required|max:10',
            'phoneNumber'=>'required|max:100',
            'RD'=>'required|max:100',
        ]);
        // if($fields.fails()){
        //     return response()->json([
        //         'message'=>'Error message',
        //         'error'=>$fields->message(),
        //     ]);
        // };
        $xx=Student::create([
            'course_id'=>$request->course_id,
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'gender'=>$request->gender,
            'phoneNumber'=>$request->phoneNumber,
            'RD'=>$request->RD,
            'isActive'=>$request->isActive,
        ]);

        return [
            'Response: '=>'Success',
            //'datas'=>$xx,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
