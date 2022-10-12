@extends('admin.layout.default')

@section('title', 'Update category')

@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">Update-category</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>Update</h1>          
        </ul>
    </div>
</div>
<form class="form-horizontal" action="{{ Route('blogCategory.update', $categoryinfo->id) }}" method="POST">
    @method('put')
    @csrf;

    <fieldset class="content-group">

        <div class="form-group">
            <label class="control-label col-lg-4">Update Name</label>
            <div class="col-lg-8">
                <input type="text" name="name" class="form-control" value="{{ $categoryinfo->name }}">
            </div>
        </div>

        </fieldset>

   

    <div class="text-right">
        <button type="submit" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> <a href="{{ route('blogCategory.index') }}"> Go Back </a> </button>
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
        
    </div>
</form>

@endsection