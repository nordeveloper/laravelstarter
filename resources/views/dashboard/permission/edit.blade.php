@extends('dashboard.layout.main')
@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('permissions.index') }}">Назад к списоку </a></p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Permission {{$result->id}}</h3>
        </div>
        <form class="card-body" action="{{ route('permissions.update', $result->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PATCH')
            <div class="form-group">
                <label>{{__('Name')}}</label>
                <input type="text" class="form-control" name="name" value="{{$result->name}}">
            </div>
            <div class="form-group">
                <label>{{__('Guard Name')}}</label>
                <input type="text" class="form-control" name="guard_name" value="{{$result->guard_name}}">
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
                <input type="submit" class="btn btn-success" name="submit" value="{{__('Save')}}">
            </div>
        </form>
    </div>

@endsection
