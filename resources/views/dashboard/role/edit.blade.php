@extends('dashboard.layouts.main')

@section('breadcrumb')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="/dashboard/roles">Roles</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{route('roles.index')}}">Back to list</a></p>
    <div class="card">
        <div class="card-header">
           <h3 class="card-title">Edit role։ {{$result->name}}</h3>
        </div>
        <form class="card-body" action="{{ route('roles.update', $result->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
                <label>{{__('Name')}}</label>
                <input type="text" class="form-control" name="name" value="{{$result->name}}">
            </div>
            <div class="form-group">
                <label>{{__('Code')}}</label>
                <input type="text" class="form-control" name="code" value="{{$result->code}}">
            </div>
            <div class="form-group">
                <label>{{__('Description')}}</label>
                <input type="text" class="form-control" name="description" value="{{$result->description}}">
            </div>

            <div class="form-group">
                <label>{{__('Permissions')}}</label>
                <input type="text" class="form-control" name="roles_permissions">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="{{__('Save')}}">
            </div>
        </form>
    </div>

@endsection
