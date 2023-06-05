@extends('dashboard.layouts.main')

@section('content')
    <div class="card">
    <div class="card-header">
        @if( !empty($result->id) )
        <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
        @else
        <p class="h4">{{__('Add Blog')}}</p>
        @endif
        <p><a class="btn btn-info btn-xs" href="{{ route('blog.index') }}">Back to list </a></p>
    </div>
    </div>

    @php
    if( !empty($result->id) )
       {
        $action = route('blog.update', $result->id );
       }
    else{
        $action = route('blog.store');
    }
    @endphp



    <form action="{{$action}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if( !empty($result->id) )
    @method('PATCH')
    @endif
    <div class="row">

    <div class="col-md-7 card">
        <div class="card-body">

        <div class="form-group">
            <label>
            <input type="checkbox" name="active" @if(!empty($result->active)) checked @endif value="1"> Active
            </label>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
                @if($catagories->count())
                    @foreach ($catagories as $category)
                        <option @if( !empty($result->category_id) and $result->category_id==$category->id) selected @endif value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="@if(!empty($result->sort)) {{$result->sort}} @else {{old('sort')}} @endif">
        </div>

        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="@if(!empty($result->title)) {{$result->title}} @else {{old('title')}} @endif">
        </div>

        <div class="form-group">
            <label>Slug (Alias)</label>
            <input type="text" class="form-control" name="alias" value="@if(!empty($result->alias)) {{$result->alias}} @else {{old('alias')}} @endif">
        </div>

        <div class="form-group">
            <label>Anonce</label>
            <textarea name="preview_text" class="form-control textarea" cols="30" rows="6">@if (!empty($result->preview_text)){{$result->preview_text}} @else {{old('preview_text')}} @endif</textarea>
        </div>


        <div class="form-group">
        <label>Detail text</label>
            <textarea name="detail_text" class="form-control textarea" cols="30" rows="6">@if (!empty($result->detail_text)){{$result->detail_text}} @else {{old('detail_text')}} @endif</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success" name="submit" value="y"><i class="fa fa-save"></i> Save</button>
        </div>
        </div>
    </div>

    <div class="col-md-5 card">
        <div class="card-body">

        <div class="form-grop">
            <label>Type</label>
            <select name="type" class="form-control">
                <option value=""></option>
                @if(!empty($blogtypes))
                @foreach ($blogtypes as $type)
                <option @if( !empty($result->type) and $type==$result->type) selected @endif value="{{$type}}">{{$type}}</option>
                @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label>Video url</label>
            <input type="text" class="form-control" name="video_url" value="@if(!empty($result->video_url)){{$result->video_url}}@else{{old('video_url')}}@endif" >
        </div>

        <div class="form-group">
          @isset($result->preview_image)
            <div class="image-wrapp">
                <i class="fas fa-trash-alt btn-remove" class="del-img" data-img="preview"></i>
                <img class="img-responsive" src="{{ asset('/storage/'. $result->preview_image )}}" alt="{{$result->preview_image}}">
            </div>
          @endisset
            <label>Preview image (создается из детальной если нет задан)</label><br>
            <input type="file" name="preview_image">
        </div>

        <div class="form-group">
          @isset($result->detail_image)
            <div class="image-wrapp">
            <i class="fas fa-trash-alt btn-remove" class="del-img" data-img="detail"></i>
            <img class="img-responsive" src="{{ asset('/storage/'. $result->detail_image )}}" alt="">
            </div>
          @endisset
            <label>Detail image</label><br>
            <input type="file" name="detail_image">
        </div>

        <div class="form-group">
        <label>Мета title</label>
        <input type="text" class="form-control" name="meta_title" value="@isset($result->meta_title) {{$result->meta_title}} @endisset">
        </div>

        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="@isset($result->meta_description) {{$result->meta_description}} @endisset">
        </div>

        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2">@isset($result->meta_keywords) {{$result->meta_keywords}} @endisset</textarea>
        </div>
        </div>
    </div>

</div>


</form>
@endsection
