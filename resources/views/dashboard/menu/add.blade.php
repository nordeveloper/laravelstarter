@extends('dashboard.layouts.main')

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ route('menus.index') }}">Back to list </a></p>

    <p class="h4">Add menu</p>

    <div class="card">
    <form class="card-body" action="{{ route('menus.store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
    </div>

    <div class="form-group">
        <label>Code</label>
        <input type="text" class="form-control" name="code">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" name="submit" value="Save">
    </div>

    </form>

</div>

@endsection
