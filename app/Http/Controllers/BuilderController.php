<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\World;
use App\Models\Location;
use App\Models\Character;
use App\Models\Story;

class BuilderController extends Controller
{
    public function index()
    {
    	session(['user_session' => User::find(1)]);
    	return view("dashboard");
    }


    // --------------------------------Worlds Management--------------------------
    
    public function worlds()
    {
    	$data = array();
    	$data['worlds'] = World::all();
    	return view("worlds",$data);
    }

    public function world_save(Request $request)
    {
    	$world = new World();
    	$world->user()->associate(User::find(1));
    	$world->name = $request->post('worldname');
    	$world->description = $request->post('worlddescription');
    	$world->save();

    	return redirect("/worlds");
    }

	public function world_update()
    {
    	
    }    

    public function world_delete(Request $request)
    {
    	$id = $request->get('id');
    	$world = World::findOrFail($id);
    	$world->delete();

    	return redirect("/worlds");
    }

    //------------------------------------------------------------------------------ 

}
