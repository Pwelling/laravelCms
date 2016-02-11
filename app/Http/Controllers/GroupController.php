<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Group;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function getPages(){
		return $this->hasMany('App\Page');
	}
	
	/**
	 * Opent het scherm met het overzicht van de groepen
	 */
	public function listGroups(){
		$groups = \App\Group::all();
		return view('groups',['groups'=>$groups]);
	}
	
	/**
	 * Opent het scherm om een groep te bewerken
	 */
	public function editGroup($groupName){
		$group = \App\Group::where('name','=',$groupName)->first();
		return view('group',['group'=>$group]);
	}
	
	public function newGroup(){
		return view('group');
	}
	
	/**
	 * Functie die het opslaan van een groep regelt
	 */
	public function saveGroup(Request $request,$id=false){
		$messages = [
  		  'required' => 'De groepsnaam is verplicht.',
		];
		$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ],$messages);
		if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)
                        ->withInput();
        }
		if($id === false){ //Het is een insert
			$group = new Group;
	    	$group->name = $request->name;
	   		$group->save();
			$mes = 'Groep is opgeslagen!';
		} else { //het is een update
			Group::where('id', $id)->update(['name' => $request->input('name')]);
			$mes = 'Groep is Bijgewerkt!';
		}
		return redirect('/group/'.$request->input('name'))->with('status', $mes);
	}
	
	public function removeGroup(Request $request){
		
	}
}
