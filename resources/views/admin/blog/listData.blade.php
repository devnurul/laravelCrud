@extends('admin.layout.default')

@section('title', 'Blog')


@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">Blog</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>All Post</h1>          
        </ul>

        <ul class="breadcrumb-elements">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a class="btn btn-primary btn-lg text-white" href="{{ route('blog.create') }}">Add New</a></li>
                    
                </ul>
            </div>
        </ul>
    </div>
 

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>SL.</th>
                <th>Category</th>
                <th>Title</th>
                <th>Sub Title</th>
                <th>Thumbnail</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($blogs))
                @foreach ($blogs as $key => $blog)
                    <tr>
                        <td >{{ ++$key }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->title }}</td>
                        <td>{{ $blog->sub_title }}</td>
                        <td><img width="120px" height="100px" src="{{ asset('uploads/blogThumbs/'.$blog->thumbnail) }}" alt=""></td>
                        <td>{{ $blog->description }}</td>
                        <td>
                            @if ($blog->valid == 1)
                                <span class="label label-success">Active</span>
                            @else
                                <span class="label label-danger">InActive</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="{{ route('blog.edit', $blog->id) }}" class="open-modal" selector="blogUpdate" modal-title="Blog Update" modal-type="Update"><i class="icon-pencil"></i></a>
                           
                            <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit"><i class="icon-bin"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No Data found!</td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
@endsection