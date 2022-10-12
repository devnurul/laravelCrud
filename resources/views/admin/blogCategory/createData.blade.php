@extends('admin.layout.default')

@section('title', 'Create Categort')

@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">create-category</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>Add New Blog Category</h1>          
        </ul>
    </div>
</div>
<form class="form-horizontal" action="{{ Route('blogCategory.store') }}" method="POST">
    @csrf;

    <fieldset class="content-group">

        <div class="form-group">
            <label class="control-label col-lg-2">Category Name</label>
            <div class="col-lg-10">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
     </fieldset>

   

    <div class="text-right">
        <button type="submit" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> <a href="{{ route('blogCategory.index') }}"> Go Back </a> </button>
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
        
    </div>
</form>

@endsection