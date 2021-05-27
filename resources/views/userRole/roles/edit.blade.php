@extends('backend.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right mb-5 mt-3">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            <label for="name">Permissions</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkPermissionAll"
                value="1" {{ App\User::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}
                onclick="checkPermissionByGroup('allInput', this)">
                <label class="form-check-label" for="checkPermissionAll">All</label>
            </div>
            <hr>
            @php $i = 1; @endphp
            @foreach ($permission_groups as $group)
            <div class="row allInput">
                @php
                $permissions = App\User::getpermissionsByGroupName($group->name);
                $j = 1;
                @endphp
                
                <div class="col-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management"
                        value="{{ $group->name }}"
                        onclick="checkPermissionByGroup('role-{{$i}}-management-checkbox', this)"
                        {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $i }}Management">{{ $group->name }}</label>
                    </div>
                </div>
                <div class="col-9 role-{{ $i }}-management-checkbox">
                    
                    @foreach ($permissions as $permission)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                        onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management',
                        {{ count($permissions) }})" name="permissions[]"
                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                        id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                        <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                    @php  $j++; @endphp
                    @endforeach
                    <br>
                </div>
            </div>
            @php  $i++; @endphp
            @endforeach
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Update Role</button>
    </div>
</div>
{!! Form::close() !!}


@endsection

@section('scripts')
    @include('userRole.roles.partial.script')
@endsection