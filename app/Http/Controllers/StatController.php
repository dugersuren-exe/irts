<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stat;
use App\Http\Resources\StatResource;

class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $x=Stat::with(['attendances'])->get();

        //dd($x);
        if($x.count() > 0){
            return StatResource::collection($x);
        }else{
            return response()->json(['message'=>'No record availabel'],200);
        }
        
        //return 'srgdfgd';
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
        $xx=Stat::create([
            'name'=>$request->name,
            'abr'=>$request->abr,
        ]);

        return [
            'Response: '=>'dgsdfgsdf',
            'datas'=>$xx,
        ];
        //if($fields!=null)return "Error";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields=$request->validate([
            'name'=>'required|max:255|min:3',
            'abr'=>'required|max:1',
        ]);
        // if($fields.fails()){
        //     return response()->json([
        //         'message'=>'Error message',
        //         'error'=>$fields->message(),
        //     ]);
        // };
        $xx=Stat::create([
            'name'=>$request->name,
            'abr'=>$request->abr,
        ]);

        return [
            'Response: '=>'dgsdfgsdf',
            'datas'=>$xx,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Stat $stat)
    {
        //$x=Stat::all();
        return ['stat'=>$stat];
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
        $res=Stat::find($id)->delete();

        if ($res){
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
         return response()->json($data);

        //$x= Stat::delete($id);
        // $st = Stat::find($id); 
        // if(!$st)return "Тийм индекс байхгүй";
        // $x=$st->delete();
        // return $x;
    }
}
