@extends('admin.layout.default')

@section('title', 'Create User')

@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">create-user</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>Add New</h1>          
        </ul>
    </div>
</div>
<form class="form-horizontal" action="{{ url('user/edit', $user->id) }}" method="POST">
    @method('put')
    @csrf;
    
   

    <fieldset class="content-group">

        <div class="form-group">
            <label class="control-label col-lg-4">Type your full name</label>
            <div class="col-lg-8">
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-lg-4">Type your Email</label>
            <div class="col-lg-8">
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-lg-4"> Your Password</label>
            <div class="col-lg-8">
                <input type="password" name="password" class="form-control" value="{{ $user->password }}">
            </div>
        </div>

        </fieldset>

   

    <div class="text-right">
        <button type="submit" class="btn btn-primary"><i class="icon-arrow-left13 position-left"></i> <a href="{{ url('/users') }}"> Go Back </a> </button>
        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
        
    </div>
</form>

@endsection