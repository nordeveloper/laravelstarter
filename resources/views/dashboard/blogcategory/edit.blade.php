@extends('dashboard.layouts.main') 
 @section('content')
<div class="card">
        <div class="card-header">
            <p class="h4">{{__('Edit')}}: {{$result->title}}</p>
            <p><a class="btn btn-info btn-xs" href="{{ route('blogcategory.index') }}">back to list </a></p>
        </div>
        <form class="card-body" action="{{ route('blogcategory.update', $result->id ) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        @method('PATCH')
        <div class="form-group">
            <label>
            <input type="checkbox" name="active" @if($result->active==1) checked @endif value="1"> Active
            </label>
        </div>
    
        <div class="form-group">
            <label>Sort</label>
            <input type="text" class="form-control" name="sort" value="{{$result->sort}}">
        </div>
    
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" value="{{$result->title}}">
        </div>
    
        <div class="form-group">
            <label>Alias (slug)</label>
            <input type="text" class="form-control" name="slug" value="{{$result->slug}}">
        </div>
    
        <div class="form-group">    
        @isset($result->preview_image)
            <img class="img-responsive" src="{{ asset('/storage/'. $result->preview_image )}}" alt=""><br>
        @endisset
    
            <label>Preview image</label><br>
            <input type="file" name="preview_image">
        </div>
    
        <div class="form-group">
            <label>Preview text</label>
            <textarea name="preview_text" class="form-control" cols="30" rows="6">{{$result->preview_text}}</textarea>
        </div>
    
        <div class="form-group">
    
        @isset($result->detail_image)
            <img class="img-responsive" src="{{ asset('/storage/'. $result->detail_image )}}" alt=""><br>
        @endisset
    
            <label>Detail image</label>
            <input type="file" name="detail_image">
        </div>
    
        <div class="form-group">
        <label>Detail text</label>
            <textarea name="detail_text" class="form-control" cols="30" rows="6">{{$result->detail_text}}</textarea>
        </div>
    
        <div class="form-group">
            <label>Мета title</label>
            <input type="text" class="form-control" name="meta_title" value="{{$result->meta_title}}">
        </div>
    
        <div class="form-group">
            <label>Мета description</label>
            <input type="text" class="form-control" name="meta_description" value="{{$result->meta_description}}">
        </div>
    
        <div class="form-group">
            <label>Мета keywords</label>
            <textarea name="meta_keywords" class="form-control" cols="30" rows="2">{{$result->meta_keywords}}</textarea>
        </div>
    
        <div class="form-group">
            <input type="submit" class="btn btn-success" name="submit" value="Save">
        </div>
        </form>
    </div>
@endsection