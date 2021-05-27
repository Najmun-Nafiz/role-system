@extends('backend.layouts.app')

{{-- @section('title')
Role Create - Role Panel
@endsection --}}


@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Role Management</h1>
        @can('role-create')
        <a href="{{ route('roles.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-fw fa-wrench fa-sm text-white-50"></i>  Back</a>
        @endcan        
    </div>
    <div class="row">
        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permission:</strong>
                <hr />

                @php $i = 1; @endphp
                @foreach ($permission_groups as $group)
                    <div class="row">
                        <div class="col-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management"
                                    value="{{ $group->name }}"
                                    onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                <label class="form-check-label" for="{{ $i }}Management">{{ $group->name }}</label>
                            </div>
                        </div>
                        <div class="col-9 role-{{ $i }}-management-checkbox">
                            @php
                            $permissions = App\User::getpermissionsByGroupName($group->name);
                            $j = 1;
                            @endphp
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="permissions[]"
                                        id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                    <label class="form-check-label"
                                        for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                                @php $j++; @endphp
                            @endforeach
                            <br>
                        </div>
                    </div>
                    @php $i++; @endphp
                @endforeach


                <br />

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    {!! Form::close() !!}
    </div>

</div>

@endsection

@section('scripts')
    @include('userRole.roles.partial.script')
@endsection