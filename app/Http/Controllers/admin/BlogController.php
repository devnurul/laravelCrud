<?php

namespace App\Http\Controllers\admin;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] =Blog::join('blog_categories','blog_categories.id','=','blogs.category_id')
        ->select('blogs.*', 'blog_categories.name' )->get();
        // $data['blogCategories'] = Blog::all();
        return view('admin.blog.listData', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['blogCategories'] =BlogCategory::get();
        return view('admin.blog.createData', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'title'       => 'required',
            
        ]);

        if ($validator->passes()) {

            Blog::create([
                'category_id' => $request->category_id,
                'title'       => $request->title,
                'sub_title'   => $request->sub_title,
                'description' => $request->description,
                'thumbnail'   => self::fileUploader($request->thumbnail, public_path('uploads/blogThumbs')),
                'valid'       => $request->valid,
            ]);
            Toastr::success('Blog created successfully', 'Success');
        } else {
            $errMsgs = $validator->messages();
            foreach ($errMsgs->all() as $msg) {
                Toastr::error($msg, 'Required');
            }
        }

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
        $data['categoryinfo'] = Blog::find($id);
        return view('admin.blog.updateData', $data);
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
        Blog::find($id)->update([
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
        Blog::find($id)->delete();
        Toastr::success('User has been successfuly update', 'Deleted', ["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }



    public static function fileUploader($mailFile, $path){

            $fileName = time().'.'.$mailFile->extension();
            $mailFile->move($path, $fileName);
            return $fileName;
    }
}


