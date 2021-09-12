@extends('dashboard.layouts.main')

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('menus.index') }}">Назад к списоку </a></p>

<div class="card">

    <form class="card-body" action="{{ route('menus.update', $result->id ) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PATCH')

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$result->name}}">
    </div>

    <div class="form-group">
        <label>Code</label>
        <input type="text" class="form-control" name="code" value="{{$result->code}}">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" name="submit" value="Сохранить">
    </div>

    </form>
</div>

@endsection
