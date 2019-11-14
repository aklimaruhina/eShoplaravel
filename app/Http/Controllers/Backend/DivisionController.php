<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\division;
use App\district;

class DivisionController extends Controller
{
    // Manage All Division Page
    public function index()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view ('Backend.pages.divisions.manage', compact('divisions'));
    }

    // Add New Division Page
    public function create()
    {
        return view('Backend.pages.divisions.createdivisions');
    }


    // Create e New Division
    public function store(Request $request)
    {
        // Validate The Form Data
        $request->validate([
            'name'              => 'required|max:255',
            'priority'       	=> 'required|max:100',
        ],
        [
            'name.required'         => 'Please Provide Division Name',
            'priority.required'  	=> 'Please Provide Priority Number to Display on the Dashboard', 
        ]);

        $division = new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
		$division->save();

        session()->flash('success', 'A New Division Has Been Added Successfully');
        return redirect()->route('admin.divisions');
    }



    // Go to the Edit Division Page
    public function edit_brand($id)
    {
        $division = Division::find($id);
        if ( !is_null($division) ){
            return view('Backend.pages.divisions.editdivisions', compact('division'));
        }else{
            return route('admin.divisions');
        }
    }

    // Update The Division Name
    public function update(Request $request, $id)
    {
        // Validate The Form Data
        $request->validate([
            'name'              => 'required|max:255',
            'priority'       	=> 'required|max:100',
        ],
        [
            'name.required'         => 'Please Provide division Name',
            'priority.required'  => 'Please Provide Priority Number to Display on the Dashboard',
        ]);

        $division = Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success', 'A New Division Has Been Added Successfully');
        return redirect()->route('admin.divisions');
    }

    // Division Delete Function
    public function delete($id)
    {
        $division = Division::find($id);
        if ( !is_null($division) )
        {   
            $districts = District::where('division_id', $division->id)->get();
            foreach ( $districts as $district ){
            	$district->delete();
            }
            $division->delete();
        }
        session()->flash('success', 'Division Successfully Deleted');
        return back();
    }
}
