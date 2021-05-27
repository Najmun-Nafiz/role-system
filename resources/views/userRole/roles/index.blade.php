@extends('backend.layouts.app')

@section('title')
    All Roles
@endsection

@section('styles')
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role Management</h1>
        @can('role-create')
        <a href="{{ route('roles.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-fw fa-wrench fa-sm text-white-50"></i>  Create New Role</a>
        @endcan        
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered">
            <tr>
               <th>No</th>
               <th>Name</th>
               <th width="280px">Action</th>
            </tr>
              @foreach ($roles as $key => $role)
              <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $role->name }}</td>
                  <td>
                      <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                      @can('role-edit')
                          <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                      @endcan
                      @can('role-delete')
                          {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                              {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                      @endcan
                  </td>
              </tr>
              @endforeach
          </table>
          
          
          {!! $roles->render() !!}
    </div>


</div>


@endsection

@section('scripts')
@endsection