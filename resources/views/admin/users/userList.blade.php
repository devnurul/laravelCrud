@extends('admin.layout.default')

@section('title', 'Users')


@section('content')
<div class="breadcrumb-line">
    <ul class="breadcrumb">
        <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
        <li><a href="datatable_basic.html">Users</a></li> 
    </ul>
</div>

<div class="panel panel-flat mt-5">
    <div class="breadcrumb-line">
        <ul class="breadcrumb">
              <h1>User List</h1>          
        </ul>

        <ul class="breadcrumb-elements">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a class="btn btn-primary btn-lg text-white" href="{{ url('user/create') }}">Add New</a></li>
                    
                </ul>
            </div>
        </ul>
    </div>
 

    <table class="table datatable-basic">
        <thead>
            <tr>
                <th>Sirial No</th>
                <th>full name</th>
                <th>email</th>
                <th>password</th>
                <th>Status</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($users))

            @foreach ($users as $key => $user)
                <tr>
                <td>{{ ++$key}}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>Active</td>
                <td class="text-center">
                    <ul class="icons-list">
                        <li>
                            <a href="{{ url('user/edit') }}/{{ $user->id }}"> <i class= "icon-pen6"></i></a>
                        </li>
                        <li>
                            <a href="">
                               <form action="{{ url('user/delete', $user->id) }}" method="post">
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