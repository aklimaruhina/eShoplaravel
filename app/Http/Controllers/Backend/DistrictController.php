<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\division;
use App\district;

class DistrictController extends Controller
{
    // Manage All Division Page
    public function index()
    {
        $districts = District::orderBy('priority', 'asc')->get();
        return view ('Backend.pages.districts.manage', compact('districts'));
    }

    // Add New Division Page
    public function create()
    {
        return view('backend.pages.districts.createdistricts');
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
            'name.required'         => 'Please Provide Districts Name',
            'priority.required'  	=> 'Please Provide Priority Number to Display on the Dashboard', 
        ]);

        $district = new District();
        $district->name = $request->name;
        $district->priority = $request->priority;
		$district->save();

        session()->flash('success', 'A New District Has Been Added Successfully');
        return redirect()->route('admin.districts');
    }



    // Go to the Edit Division Page
    public function edit_brand($id)
    {
        $district = District::find($id);
        if ( !is_null($district) ){
            return view('Backend.pages.districts.editdistricts', compact('district'));
        }else{
            return route('admin.districts');
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
            'name.required'         => 'Please Provide District Name',
            'priority.required'  => 'Please Provide Priority Number to Display on the Dashboard',
        ]);

        $district = District::find($id);
        $district->name = $request->name;
        $district->priority = $request->priority;
        $district->save();

        session()->flash('success', 'A New District Has Been Added Successfully');
        return redirect()->route('admin.districts');
    }

    // Division Delete Function
    public function delete($id)
    {
        $district = District::find($id);
        if ( !is_null($district) )
        {   
            $district->delete();
        }
        session()->flash('success', 'District Successfully Deleted');
        return back();
    }
}
