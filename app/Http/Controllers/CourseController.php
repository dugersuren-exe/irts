<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;
use App\Http\Resources\CourseResource;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
       // return Course::all();
      try {
        $status = true;    
        $x=CourseResource::collection(Course::all());
    } catch(\Exception $ex){
        $status = false;
         $x = $ex->getMessage();
    }
      
        return response()->json([
            'data'=>$x,
        'status'=> $status]) ;
    }

    /**     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $x=Course::create([
            'teacher_id'=> $request->teacher_id,
            'grade'=> $request->grade,
            'group'=> $request->group,
            'YearLesson'=> $request->YearLesson,
            'isActive'=> $request->isActive
        ]);
        return $x;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "store";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Course::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oneCourse=Course::find($id);
        
        if($oneCourse){
            $res=$oneCourse->update([
                'teacher_id'=> $request->teacher_id,
                'grade'=> $request->grade,
                'group'=> $request->group.' UPDATED',
                'YearLesson'=> $request->YearLesson,
                'isActive'=> $request->isActive
            ]);
            return $id." кодтой өгөгдөл өөрчлөгдлөө";
        }else{
            return $id." кодтой өгөгдөл байхгүй";
        }        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res=Course::find($id);       

        if ($res.count()>0){
            $res->delete();
            $data=[
            'status'=>'1',
            'msg'=>'success'
          ];
          }else{
            $data=[
            'status'=>'0',
            'msg'=>'fail'
          ];
        }
        //return response()->json($data);

        //$x= Stat::delete($id);
        // $st = Stat::find($id); 
        // if(!$st)return "Тийм индекс байхгүй";
        // $x=$st->delete();
        // return $x;
        //return "destroy->".$id;
    }
}
