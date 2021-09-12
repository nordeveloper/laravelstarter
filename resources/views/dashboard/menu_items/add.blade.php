@extends('dashboard.layout.main')

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ url('/dashboard/menus/builder',$menu_id)}}">Back to list</a></p>

    <div class="card">

    <div class="card-header">
        <p class="h4">Adding menu item</p> 
    </div>

    <form class="card-body" action="{{ url('/dashboard/menus/builder/menuitemadd') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label>
        <input type="checkbox" name="active" value="1"> Активность
        </label>
    </div>

    <div class="form-group">
        <label>Сортировка</label>
        <input type="text" class="form-control" name="sort" value="500">
    </div>

    <div class="form-group">
        <label>Заголовок</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
    </div>

    <div class="form-group">
        <label>Сисволный код</label>
        <input type="text" class="form-control" name="code">
    </div>

        <div class="form-group">
            <label>Url</label>
            <input type="text" class="form-control" name="url">
        </div>


    <div class="form-group">
        <label>Иконка</label><br>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <input type="hidden" name="menu_id" value="{{$menu_id}}">
        <input type="submit" class="btn btn-success" name="submit" value="Save">
    </div>
    </form>

</div>

@endsection
