@extends('admin.layout.default')

@section('title', 'Create Categort')

@section('content')
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
            <li><a href="datatable_basic.html">Add New Post</a></li>
        </ul>
    </div>

    <div class="panel panel-flat mt-5">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <h1>Add New Post</h1>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" action="{{ Route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf;

        <fieldset class="content-group">

            {{-- <div class="form-group">
                <label class="control-label col-lg-2">Post Category</label>
                <div class="col-lg-10">
                    <select multiple="multiple" class="select" placeholder="Select Post Category">
                        @foreach ($blogCategories as $category)
                            @if ($category->valid == 1)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> --}}

            <div class="form-group">
                <label class="control-label col-lg-2">Category</label>
                <div class="col-lg-10">
                    <select name="category_id" class="form-control">
                        <option value="">Select</option>
                        @foreach ($blogCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-lg-2">Post title</label>
                <div class="col-lg-10">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Post Sub title</label>
                <div class="col-lg-10">
                    <input type="text" name="sub_title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Upload Post Thumbnail</label>
                <div class="col-lg-10">
                    <input type="file" name="thumbnail" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Description</label>
                <div class="col-lg-10">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>
        </fieldset>



        <div class="text-right">
            <button type="submit" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> <a
                    href="{{ route('blogCategory.index') }}"> Go Back </a> </button>
            <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>

        </div>
    </form>

@endsection
