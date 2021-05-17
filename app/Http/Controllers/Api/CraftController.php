<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Aircraft;
use DB;

class CraftController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('AircraftApp')->accessToken;
            return response()->json(['message'=>'Logged in Successfully. Use this token for futher action.', 'token' => $token, ], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    
    public function boot() {
        if (session('boot')) {
            return response()->json(['message'=>'Booted the system already.', ], 200);
        } else {
            session(['boot' => '1']);
            return response()->json(['message'=>'System Booted successfully', ], 200);
        }
    }
    

    public function getAllCrafts(Request $request){
        if (session('boot')) {
            $airCrafts = Aircraft::select("*")
                            ->orderBy("priority", "asc")
                            ->get();

            if (count($airCrafts)>0) {
                return response($airCrafts, 200);
            } else {
                return response()->json([
                "message" => "Queue is empty"
                ], 200);
            }
        } else {
            return response()->json([
                "message" => "Please boot the system"
                ], 200);
        }
    }
    
    public function getCraft($id) {
        if (session('boot')) {
            if (Aircraft::where('id', $id)->exists()) {
              $aircraft = Aircraft::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
              return response($aircraft, 200);
            } else {
              return response()->json([
                "message" => "AirCraft not found"
              ], 200);
            }
        } else {
            return response()->json([
                "message" => "Please boot the system"
                ], 200);
        }
    }
    
    public function createCraft(Request $request) {
        if (session('boot')) {
            $req = $request->input();
            $craft = new Aircraft;
            $craft->name = $req['name'];
            $craft->type = $req['type'];
            $craft->size = $req['size'];
            // Get Priority for aircraft
            $craft->priority = $this->getPriority($req['type'], $req['size']);
            $res = $craft->save();
            if ($res) {
               return response()->json([
              "message" => "Aircraft added in queue"
                ], 200); 
            } else {
                return response()->json([
              "message" => "Unable to add aircraft in queue"
                ], 200); 
            }
        } else {
            return response()->json([
                "message" => "Please boot the system"
                ], 200);
        }
    }
    
    public function updateCraft(Request $request, $id) {
        if (session('boot')) {
            $req = $request->input();
            $priority = $this->getPriority($req['type'], $req['size']);
            $response = DB::update('update ac_data set name = ?, type = ?,size=?, priority = ? where id = ?',[$req['name'], $req['type'],$req['size'],$priority,$id]);
            if ($response) {
              return response()->json([
                "message" => "Aircraft updated in queue"
                ], 200);
            } else {
                return response()->json([
                "message" => "Failed to update in queue"
                ], 200);
            }
        } else {
            return response()->json([
                "message" => "Please boot the system"
                ], 200);
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
    
    public function dequeue () {
        if (session('boot')) {
            $airCrafts = Aircraft::select("*")
                              ->orderBy("priority", "desc")
                              ->orderBy("id", "desc")
                              ->first();
            $craft=Aircraft::find($airCrafts['id']);
            $name = $airCrafts['name'];
            $res = $craft->delete();
            if($res){
               return response()->json([
                    "message" => "Successfully Dequeued the '" .$name ."' Aircraft"
                  ], 200);
           }else{
               return response()->json([
             "message" => "Queue is empty"
           ], 200);
           }
        } else {
            return response()->json([
                "message" => "Please boot the system"
                ], 200);
        }
    }
    
    public function logout (Request $request) {
        $request->session()->flush();
        $token = $request->user()->token();
        $token->revoke();
        return response()->json([
                "message" => "Logged out successfully"
                ], 200);
    }
}
