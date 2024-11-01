<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{

    public function index()
    {
        //return "Hello";
        try {    
            $status = true; 
            $x=TeacherResource::collection(Teacher::all());
        } catch(\Exception $ex){

            $status = false;
            $x = $ex->getMessage();
        }
          
        return response()->json([
            'count'=>$x->count(),
            'data'=>$x,
            'status'=> $status
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //return "Hi";
        // $validator=$request->validate([
        //     'firstName'=>'required|max:255',
        //     'lastName'=>'required|max:255',
        //     'gender'=>'required',
        //     'phoneNumber'=>'required',
        //     'lesson'=>'required',
        // ]);
       // return "Hi";
        //if($validator->fails()) return "Error";
        
        $t= Teacher::create([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'gender'=>$request->gender,
            'phoneNumber'=>$request->phoneNumber,
            'lesson'=>$request->lesson
        ]);

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
        $res=Teacher::find($id);

        if ($res){
            $del=$res->delete();
            $data=[
            'status'=>'1',
            'msg'=>'success',
            'data'=>$del
          ];
          }else{
            $data=[
            'status'=>'0',
            'msg'=>'fail'
          ];
        }
        return response()->json($data);
    }
}
