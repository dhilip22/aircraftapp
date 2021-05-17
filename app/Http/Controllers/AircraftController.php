<?php
namespace App\Http\Controllers\Api;
namespace App\Http\Controllers;

use App\Models\Aircraft;
use Illuminate\Http\Request;
use Redirect, DB;

class AircraftController extends Controller
{
    public function __construct()
	{
//        $this->boot();
    }
    
    public function boot()
    {
        session(['boot' => '1']);
        return redirect('aircraft')->with('success','System booted successfully.');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airCrafts = Aircraft::select("*")
                        ->orderBy("priority", "asc")
                        ->get();
        return view('air_craft.index', compact('airCrafts'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('air_craft.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['name'=>'required',
                                        'type'=>'required',
                                        'size'=>'required'
                                   ]);

        $craft = new  AirCraft(); 
        $craft->name=$request->name;
        $craft->type=$request->type;
        $craft->size=$request->size;
        
        $craft->priority = $this->getPriority($request->type, $request->size);
        if($craft->save()){
            return redirect('aircraft')->with('success','Inserted successfully.');
        }else{
            return redirect('aircraft')->with('error','Failed to Insert.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $aircraft['aircraft']=Aircraft::find($id);
        return view('air_craft.edit',$aircraft);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Aircraft $aircraft)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate=$request->validate(['name'=>'required','type'=>'required',
                                        'size'=>'required'
                                   ]);
        $priority = $this->getPriority($request->type, $request->size);
        $response = DB::update('update ac_data set name = ?, type = ?,size=?, priority = ? where id = ?',[$request->name, $request->type,$request->size,$priority,$request->id]);
        if($response){
          return redirect('aircraft')->with('success','Updated successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to insert. Please try again.');
        }
    }
    
    public function getPriority($type, $size){
        if ($type == 'Emergency') {
            $priority = 1;
        }
        else if ($type == 'VIP') {
            $priority = 3;
        }
        else if ($type == 'Passenger') {
            $priority = 5;
        }
        else if ($type == 'Cargo') {
            $priority = 7;     
        }
        if ($size == 'Small')
            $priority++;
        
        return $priority;
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    
    public function destroy()
    {
        $craft=Aircraft::query()->delete();
        if($craft){
            return redirect('aircraft')->with('success', 'Rebooted Successfully');
        }else{
            return redirect('aircraft')->with('error', 'Unable to delete');
        }
    }
   
    public function remove()
    {
         $airCrafts = Aircraft::select("*")
                        ->orderBy("priority", "desc")
                        ->orderBy("id", "desc")
                        ->first();
         $craft=Aircraft::find($airCrafts['id']);
         $name = $airCrafts['name'];
         $res = $craft->delete();
         if($res){
            return redirect('aircraft')->with('success', 'Dequeued the '.$name.' Successfully');
        }else{
            return redirect('aircraft')->with('error', 'Unable to Dequeued');
        }
    }
    
}