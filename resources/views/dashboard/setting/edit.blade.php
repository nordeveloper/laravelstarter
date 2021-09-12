@extends('dashboard.layout.main')
@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('settings.index') }}">Back to list</a></p>
    <div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit setting')}}</p>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.update', $result->id ) }}" method="post">
                {{ csrf_field() }}
                @method('PATCH')
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="{{$result->name}}">
                </div>
                <div class="form-group">
                    <label>Code</label>
                    <input class="form-control" name="code" value="{{$result->code}}">
                </div>
                <div class="form-group">
                    <label>Value</label>
                    <input class="form-control" name="value" value="{{$result->value}}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
