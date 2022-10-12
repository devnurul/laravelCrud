<?php

namespace App\Http\Controllers\admin;

use App\Models\BlogCategory;
use function Ramsey\Uuid\v1;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogCategories'] =BlogCategory::get();
        // $data['blogCategories'] = BlogCategory::all();
        return view('admin.blogCategory.listData', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategory.createData');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BlogCategory::create( [
            'name'      => $request->name
           ]);
           Toastr::success('User has been successfuly created', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
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
        $data['categoryinfo'] = BlogCategory::find($id);
        return view('admin.BlogCategory.updateData', $data);
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
        BlogCategory::find($id)->update([
            'name'      => $request->name,
          
        ]);
        Toastr::success('User has been successfuly update', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BlogCategory::find($id)->delete();
        Toastr::success('User has been successfuly update', 'Deleted', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }
}
