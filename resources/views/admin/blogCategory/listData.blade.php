@extends('admin.layout.default')

@section('title', 'Blog Category')


@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">blogCategories</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>Blog Categories List</h1>          
        </ul>

        <ul class="breadcrumb-elements">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a class="btn btn-primary btn-lg text-white" href="{{ route('blogCategory.create') }}">Add New</a></li>
                    
                </ul>
            </div>
        </ul>
    </div>
 

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Sirial No</th>
                <th>Category Name</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($blogCategories))

            @foreach ($blogCategories as $key => $blogCategory)
                <tr>
                     <td>{{ ++$key}}</td>
                     <td>{{ $blogCategory->name }}</td>
                     <td>
                        @if ($blogCategory->valid == 1)
                            <span class="label label-success">Active</span>
                        
                        @else
                            <span class="label label-danger">Inactive</span>
                        @endif

                    </td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li>
                                <a href="{{ route('blogCategory.edit', $blogCategory->id) }}"> <i class= "icon-pen6"></i></a>
                            </li>
                            <li>
                                <a href="">
                                <form action="{{ route('blogCategory.destroy', $blogCategory->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" ><i class= "icon-trash-alt"></i></button>
                                </form>  
                                </a>
                            
                            </li>
                        </ul>
                    </td>
            </tr>  
            @endforeach
              
            @else
            <tr>
                <td colspan="5">Data Not Found</td>
               
            </tr>  
            @endif
            

        </tbody>
    </table>
</div>
@endsection