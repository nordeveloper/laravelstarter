@extends('dashboard.layout.main')

@section('content')
    <p><a class="btn btn-info btn-xs" href="{{ url('/dashboard/menus/builder',$result->id) }}">Назад к списоку </a></p>

    <div class="card">

    <form class="card-body" action="{{ url('/dashboard/menus/builder/menuitemupdate',$result->id) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <!-- @method('PATCH') -->
    <div class="form-group">
        <label>
        <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Активность
        </label>
    </div>

    <div class="form-group">
        <label>Sort</label>
        <input type="text" class="form-control" name="sort" value="{{$result->sort}}">
    </div>

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$result->title}}">
    </div>

    <div class="form-group">
        <label>Code</label>
        <input type="text" class="form-control" name="code" value="{{$result->code}}">
    </div>

        <div class="form-group">
            <label>Url</label>
            <input type="text" class="form-control" name="url" value="{{$result->url}}">
        </div>

    <div class="form-group">
        @isset($result->image)
            <img class="img-responsive" src="{{ asset('/storage/'. $result->image )}}" alt=""><br>
        @endisset
        <label>Иконка</label><br>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <input type="hidden" name="menu_id" value="{{$menu_id}}">
        <input type="submit" class="btn btn-success" name="submit" value="Сохранить">
    </div>

    </form>
</div>

@endsection
