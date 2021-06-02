@extends('dashboard.layouts.main')
@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('permission.index') }}">Back to list </a></p>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add new Permission</h3>
        </div>
        
        <form class="card-body" action="{{ route('permission.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <label>{{__('Role')}}</label>
                <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                    <option value=""></option>
                    @foreach ($roles as $role)
                    {{$selected = ''}}
                                    
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{__('Add')}}</label>
                <input type="checkbox" name="add">
            </div>
            <div class="form-group">
                <label>{{__('Edit')}}</label>
                <input type="checkbox" name="edit">
            </div>
            <div class="form-group">
                <label>{{__('Delete')}}</label>
                <input type="checkbox" name="delete">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="{{__('Save')}}">
            </div>
        </form>
    </div>

@endsection
