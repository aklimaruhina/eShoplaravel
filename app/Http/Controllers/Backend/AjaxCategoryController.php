<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Image;
use File;
use DataTables;
class AjaxCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->ajax()) {
            // $data = Category::latest()->get();
             $query = Category::with('parent')->select('categories.*');
            // $data = Category::with('parent')->get();

            // return Datatables::of($data)
             return Datatables::eloquent($query)
                ->addIndexColumn()
                ->addColumn('cat_name', function (Category $category) {
                    return $category->parent ? $category->parent->name : '';
                })
                ->addColumn('image', function($row){
                    if($row->image){
                        $url= asset('image/category-image/'.$row->image);
                    }else{
                        $url = asset('image/category-image/category-img.png');
                    }
                    return '<img src="'.$url.'" width="120px" class="img-responsive" align="center" />';
                    
                })
                ->addColumn('action', function($row){
                    $edit_link = route('ajaxcategory.edit', $row->id);
                    $btn = '<a href="'.$edit_link.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduct">Edit</a>';
                    $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProduct">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['cat_name','image','action'])
                ->make(true);
                    
        }
        return view('backend.pages.categories.index');
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
        $primary_categories = Category::orderBy('name', 'desc')->where('parent_id', NULL)->get(); 
        $category = Category::find($id);
        if(!is_null($category)){
            return view('backend.pages.categories.editcategory', compact('category', 'primary_categories'));     
        }
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
}
