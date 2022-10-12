@extends('admin.layout.default')

@section('title', 'dashboard')


@section('content')
<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Dashboard</span> </h4>
        </div>
    </div>

    <div class="breadcrumb-line">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="icon-home2 position-left"></i>Admin</a></li>
            <li><a href="datatable_basic.html">Dashboard</a></li>
            
        </ul>

        <ul class="breadcrumb-elements">
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                    <li><a data-action="reload"></a></li>
                    <li><a data-action="close"></a></li>
                </ul>
            </div>
        </ul>
    </div>
</div>
<div class="panel panel-flat">
    <h2>Welcome to admin Dashboard</h2>
</div>
@endsection